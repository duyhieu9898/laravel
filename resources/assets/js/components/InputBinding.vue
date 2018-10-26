<template>
    <div class="input-binding">
        <div id="content">Input Binding</div>
        <div class="text">
            {{ message }}
        </div>
        <input type="text" :value="ccsss" :placeholder="ll" name="">
        <input type="checkbox" v-model="message" name="" value="">
        <div class="input-form">
            <input type="radio" v-model="message" value="one">
            <input type="radio" v-model="message" value="two">
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            message: "",
            checkbox: false
        }
    }
};
</script>
<style lang="scss" scoped></style>