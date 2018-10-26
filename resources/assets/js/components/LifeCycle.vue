<template>
    <div class="life-cycle">
        <p ref="dom-element">{{counter}}</p>
        <div id="my-text">
            This is my text
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            message: 'Hello World',
            counter: 0
        }
    },
    beforeCreate() {
        console.log(this.message) //undefined

    },
    created() {
        /*use fetch data from backend */
        console.log(this.message) //Hello World
        //console.log(document.getElementById('my-text').innerHTML)
        /* errors template và DOM ảo chưa được mount và render*/
        //data reactive
        setInterval(() => {
            this.counter++
        }, 1000)

    },
    beforeMount() {
        console.log(this) //object vue
        //console.log(document.getElementById('my-text').innerHTML)
        /*null*/
    },
    mounted() {
        console.log(this.$el) //DOM
        console.log(document.getElementById('my-text').innerHTML) //This is my text
    },
    //Updating <=> computed, watch "data reactive" exp: use created fech data then check it
    beforeUpdate() {
        console.log(this.counter) // Logs the counter value every second, before the DOM updates.
        console.log(+this.$refs['dom-element'].textContent === this.counter) //false
    },
    updated() {
        // Fired every second, should always be true
        console.log(+this.$refs['dom-element'].textContent === this.counter) //true
    },
    beforeDestroy() {

    },
    destroy() {

    }
}
</script>
<style lang="scss" scoped>
</style>