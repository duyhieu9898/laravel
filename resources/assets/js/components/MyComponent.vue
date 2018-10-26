<template>
    <!-- <div id="content">My Component</div> cannot code here-->
    <div class="my-component">
        <div id="content">My Component</div>
        <div>
            <p>-print message</p>
            {{ message.raw }}
        </div>
        <div>
            <button class="btn btn-success btn-sm" v-on:click="sayHello">click me</button>
        </div>
        <div>
            <p>-call method, if method return value then print value</p>
            {{sayhi()}}
        </div>
        <div>
            <p>-call method, if method passed parameters </p>
            {{upperCase("raw is text lower")}}
        </div>
        <div>
            <p>-computed like function but cannot passed parameters
                it performance app <br />
                reverse</p>
            {{reverseMessage}}
        </div>
        <div>
            <button class="btn btn-success btn-sm" v-on:click="changeMessage">change message.text</button>
            <p>-message.text</p>
            {{ message.text }}
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            // message: 'This is my first component using binding data';
            message: {
                root: "My Component",
                raw: this.sayhi(),
                type: 'greeting',
                text: 'How are you?'

            }
        }
    },
    methods: {
        sayHello() {
            this.message.raw = 'You clicked button';
        },
        sayhi() {
            return "this function return value";
        },
        upperCase(text) {
            return text.toUpperCase();
        },
        changeMessage() {
            return this.message.text = "this is new message";
        }
    },
    computed: {
        reverseMessage() {
            return this.message.raw.split(' ').reverse().join(' ');
        },
        getType() {
            return this.message.type;
        },
        getText() {
            return this.message.text;
        }
    },
    watch: {
        message() {
            console.log('message changed');
        },
        reverseMessage() {
            console.log('computed changed');
        },
        message: {
            handler: function() {
                console.log('something changed')
            },
            deep: true
        },
        getType() {
            console.log('type changed')
        },
        getText() {
            console.log('text changed')
        }
    }
};
</script>
<style lang="css">
/* public style */
* {
    margin: 0;
    padding: 0;
}

#content {
    color: white;
    background: var(--red);
    margin: 10px 0;

}

.my-component {
    color: var(--red);
}

p {
    color: var(--blue);
}
</style>