<template>
    <div>
        <!-- v-if equal v-show 
            v-if = false no render
            v-show = display
        -->
        <div class="title">{{message.root}}</div>
        <div class="conditional-rendering">
            <div class="if">
                <div class="block-1" v-if="isActive == false">
                    This is block 1-if
                </div>
                <div class="block-2" v-else>
                    This is block 2-if
                </div>
                <div>
                    <button class="btn btn-success btn-sm" v-on:click="toggleActive">click me</button>
                </div>
            </div>
            <!-- exp: v-show -->
            <div class="show">
                <div class="block-1" v-show="isActive == false">
                    This is block 1-show
                </div>
                <div class="block-2" v-show="isActive == true">
                    This is block 2-show
                </div>
                <div class="buton" v-on:click="isActive=!isActive">
                    <button class="btn btn-success btn-sm">click me</button>
                </div>
            </div>
            <!-- exp: v-for -->
            <!-- array -->
            <div class="for">
                <ul>
                    <li v-for="(item,index) in items">
                        {{item.name}} - at index {{ index }}
                    </li>
                </ul>
            </div>
            <!-- object -->
            <div class="for">
                <ul>
                    <li v-for="(value,key,index) in myinfo">
                        {{key}} : {{value}} - at index {{ index }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        console.log('Component ConditionalRendering.');
    },
    data() {
        return {
            message: {
                root: "Conditional Rendering"
            },
            items: [
                { name: "chicken" },
                { name: "pig" },
                { name: "dog" },
            ],
            myinfo: {
                name: "Hieu",
                age: 18,
                country: "VN",
            },
            isActive: true
        }
    },

    methods: {
        toggleActive() {
            if (this.isActive == true) {
                this.isActive = false;
            } else {
                this.isActive = true;
            }
        }
    }
};
</script>
<style lang='css' scoped>
div.title {
    background-color: var(--red);
    color: white;
}
</style>