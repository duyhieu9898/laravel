<template>
    <div class="event-handling">
        <div id="content">Event Handling</div>
        <div>Current Number: {{ counter }}</div>
        <button @click="counter++">CLick ++</button>
        <button @click="increaseCounter(10)">Click +=10</button>
        <div @click="alertHello">
            <button @click.stop="alertWelcome">CLick</button><!-- run firts -->
        </div>
        <form @submit.prevent>
            <button type="submit">Submit</button><!-- re-load  -->
        </form>
        <!-- click.once
        click.capture
        click.self = click.stop -->
        <!-- 
		hành vi mặc định của sự kiện scroll (cuộn trang) sẽ xảy ra 
		ngay lập tức, thay vì đợi `onScroll` hoàn tất.
		-->
        <div v-on:scroll.passive="onScroll">...</div>
        <!-- @keyup. -->
    </div>
</template>
<script>
export default {
    data() {
        return {
            counter: 0
        }
    },
    methods: {
        increaseCounter(number) {
            this.counter += number;
        },
        alertHello() {
            alert('Hello')
        },
        alertWelcome() {
            alert('Welcome')
        }
    }
};
</script>
<style lang="scss"></style>