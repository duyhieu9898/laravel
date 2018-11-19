<template>
    <div class="input-binding">
        <div id="content">Input Binding</div>
        <div class="text">
            <p>mix-content: <span>{{ message }}</span></p>
        </div>
        
        <div class="input-form">
        	<input type="text" v-model="message" placeholder="v-model">
        	<input type="checkbox" v-model="message">
            <input type="radio" v-model="message" value="one">
            <input type="radio" v-model="message" value="two">
            <input type="radio" v-model="message" value="three">
            <select v-model="message" >
                <option value="" hidden>Choose one</option>
                <option :value="values.one">One</option>
                <option :value="values.two">Two</option>
                <option value="three">three</option>
            </select>
        </div>
        <!-- bind value placeholder -->
		<input type="text" :value="values.text" :placeholder="placeholder" name="">
		<!-- bind when enter input -->
		<input v-model.lazy="message" placeholder="v-model.lazy">
		<!-- NUMBER -->
		<input type="number" v-model="message" placeholder="string">
		<input type="number" v-model.number="message" placeholder="number">
		<!-- TRIM -->
		<input type="number" v-model.trim="message" placeholder="trim space">
			
    </div>
</template>
<script>
export default {
    data() {
        return {
            message: "",
            checkbox: false, 
            values:{
            	one: 'This is One',
                two: 'This is Two',
                text: 'this is a text'
            },
            placeholder:'bind value and placeholder',
        }
    }
};
</script>
<style lang="scss" scoped>
	span {
		color:var(--green);
	}
</style>