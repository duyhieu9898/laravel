<template>
    <div class="binding-html">
        <div class="bind-class" :class="{active: isActive, hide: isHide, show: isShow}">
            this is a text have bind-class
        </div>
        <div class="bind-array-class" :class="[activeClass]">
            This is text have bind-array
        </div>
        <div class="bind-object-class" :class="classObject">
            This is text have bind-object-class
        </div>
        <div>
            <button @click="isActive = !isActive">Active text</button>
        </div>
        <div>
            <button @click="isHide = !isHide">Hide text</button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            isActive: false,
            isHide: false,
            isShow: false,
            activeClass: 'active',
            boldClass: 'bold',
            classObject: {
                active: true,
                bold: true,
            }
        }
    }
};
</script>
<style lang="scss" scoped>
.active {
    color: red;
}

.hide {
    display: none;
}

.show {
    display: block;
}

.bold {
    font-weight: bold;
}
</style>