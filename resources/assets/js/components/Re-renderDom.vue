<template>
    <div class="re-render">
        <div id="content">Re-render Dom</div>
        <div class="lead">
            <span>name: </span>{{person.name}}
        </div>
        <div>
            <span>nick name: </span>{{person.nickname}}
        </div>
        <div>
            <button class="btn btn-success btn-sm" @click="changeName">Change Name</button>
        </div>
        <div>
            <button class="btn btn-warning btn-sm" @click="changeNickName">Change Nick Name</button>
        </div>
        <div>
            <button class="btn btn-danger btn-sm" @click="changeNicknameProperly">Change NIck name properly</button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            person: {
                name: 'Edddison'
            }
        }
    },
    methods: {
        changeName() {
            this.person.name = Math.random().toString(36).substring(7);
            //no re-render dom
            //solve use object.$forceUpdate() or Vue.set('object','key','value')
        },
        changeNickName() {
            this.person.nickname = Math.random().toString(36).substring(7);
            this.$forceUpdate(); //recommended
        },
        changeNicknameProperly() {
            Vue.set(this.person, 'nickname', 'Louis');
        }
    },
};
</script>
<style lang="scss" scoped></style>