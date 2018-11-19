<template>
    <div class="api-calling">
        <div id="content">API Calling</div>
        <div class="create-form ">
            <div class="product-name-input form-group">
                <input class="form-control" type="text" v-model="product.name" :placeholder="placehoder.name">
                <div class="error" v-if="errors.name != ''">
                    <span >{{ errors.name }}</span>
                </div>
            </div>
            <div class="product-price-input form-group">
                <input class="form-control" type="text" v-model.number="product.price" :placeholder="placehoder.price">
                <div class="error" v-if="errors.price != ''">
                    <span >{{ errors.price }}</span>
                </div>
            </div>
            <div class="button-create">
                <button class="btn btn-primary" @click="createProduct">Create</button>
            </div>
        </div>
        <hr>
        <div class="list-products">
            <h2>LIST PRODUCT</h2>
            <div class="product-table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Date created</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(prod, index) in list_products">
                            <td>{{ prod.id }}</td>
                            <td v-if="!prod.isEdit">
                                {{ prod.name }}
                            </td>
                            <td v-else>
                                <input type="text" class="form-control" v-model="prod.name">
                                <div class="error" v-if="errors.name != ''">
                                    <div class="alert-danger">
                                        <strong>{{ errors.name }}</strong>
                                    </div>
                                </div>
                            </td>
                            <td v-if="!prod.isEdit">
                                {{ prod.price }}
                            </td>
                            <td v-else>
                                <input type="text" class="form-control" v-model.number="prod.price">
                                <div class="error" v-if="errors.price != ''">
                                    <div class="alert-danger">
                                        <strong>{{ errors.price }}</strong>
                                    </div>
                                </div>
                            </td>
                            <td>{{ prod.created_at }}</td>
                            <td v-if="!prod.isEdit">
                                <button class="btn btn-success" @click="prod.isEdit = true">Edit</button>
                                <button class="btn btn-danger" @click="deleteProduct(prod, index)">Delete</button>
                            </td>
                            <td v-else>
                                <button class="btn btn-primary" @click="updateProduct(prod)">Save</button>
                                <button class="btn btn-danger" @click="prod.isEdit = false">Cancel</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import moment from 'moment'
export default {
    data() {
        return {
            product: {
                name: '',
                price: 0
            },
            placehoder: {
                name: "Tên",
                price: "giá bán"
            },
            errors: {
                name: '',
                price: '',
            },
            list_products: []
        }
    },
    created() {
        this.getListProducts()
    },
    methods: {
        createProduct() {
            axios.post('/products', { name: this.product.name, price: this.product.price })
                .then(response => {
                    alert(response.data.result)
                    this.list_products.push({
                        id: this.list_products.length + 1,
                        name: this.product.name,
                        price: this.product.price,
                        created_at: moment().format('YYYY-MM-DD HH:mm:ss')
                    });

                    this.product.name = "";
                    this.product.price = "";
                })
                .catch(errors => {
                    if (errors.response.data.errors.name) {
                        this.errors.name = errors.response.data.errors.name
                    }
                    if (errors.response.data.errors.price) {
                        this.errors.price = errors.response.data.errors.price
                    }
                })
        },
        getListProducts() {
            console.log('call');
            axios.get('/products')
                .then(response => {
                    this.list_products = response.data;
                    this.list_products.forEach(item => {
                        Vue.set(item, 'isEdit', false)
                    })
                })
                .catch(errors => {
                    if (errors.response.data.errors.name) {
                        this.errors.name = errors.response.data.errors.name
                    }
                    if (errors.response.data.errors.price) {
                        this.errors.price = errors.response.data.errors.price
                    }
                })
        },
        updateProduct(product) {
            axios.put('/products/' + product.id, { name: product.name, price: product.price })
                .then(response => {
                    console.log(response.data.result)
                    product.isEdit = false
                })
                .catch(errors => {
                    if (errors.response.data.errors.name) {
                        this.errors.name = errors.response.data.errors.name
                    }
                    if (errors.response.data.errors.price) {
                        this.errors.price = errors.response.data.errors.price
                    }
                })
        },
        deleteProduct(product, index) {
            axios.delete('/products/' + product.id)
                .then(response => {
                    console.log(response.data.result)
                    this.list_products.splice(index, 1)
                })
                .catch(error => {
                    this.errors = error.response.data.errors.name
                })
        }

    }
};
</script>
<style lang="scss" scoped>
.error {
    span {
        color: red;
    }
}
</style>