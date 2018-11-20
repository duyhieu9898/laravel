<template>
    <div class="user-management">
        <div id="content">Auth with laravel vs vuejs</div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#app-navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false">
                        <span class=" navbar-toggler-icon"></span>
                    </button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="/">
                       Laravel
                   </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                   {{ currentUser.name }} <span class="caret"></span>
                               </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="/logout">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ...Navbar -->
        <div class="list_user table-responsive container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Role</td>
                        <td v-if="checkIsAdmin">Action</td>
                    </tr>
                </thead>
                <tbody v-if="list_users.length">
                    <tr v-for="(user, index) in list_users">
                        <td>{{ user.id }}</td>
                        <td v-if="!user.isEdit">
                            {{ user.name }}
                        </td>
                        <td v-else>
                            <input type="text" class="form-control" v-model.lazy="user.name">
                        </td>
                        <td v-if="!user.isEdit">
                            {{ user.email }}
                        </td>
                        <td v-else>
                            <input type="text" class="form-control" v-model.lazy="user.email">
                        </td>
                        <td v-if="!user.isEdit">
                            <span v-for="role in user.roles">
        						{{ role.name }}
        					</span>
                        </td>
                        <td v-else>
                            <select class="form-control" v-model.lazy="user.roles[0].name">
                                <option value="employee">Employee</option>
                                <option value="saler">Saler</option>
                                <option value="admin">Admin</option>
                            </select>
                        </td>
                        <td v-if="checkIsAdmin&&!user.isEdit">
                            <button class="btn btn-success" @click="user.isEdit = true">
                                Edit
                            </button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                        <td v-else>
                            <button class="btn btn-primary" @click="updateUser(user)">Save</button>
                            <button class="btn btn-danger" @click="user.isEdit = false ">Cancel</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="create-user container" v-if="checkIsAdmin">
            {{checkCreateUser}}
            <div class="row">
                <div class="col-md-3">
                    <input type="text" v-model="userCreate.name" class="form-control" placeholder="Name...">
                    <div class="errors-create-user" v-if="errors.name!=null">
                        <p>{{ errors.name }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="email" v-model="userCreate.email" class="form-control" placeholder="User email..." autocomplete="true">
                    <div class="errors-create-user" v-if="errors.email!=null">
                        <p>{{ errors.email }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-control" v-model="userCreate.role">
                        <option value="employee">Employee</option>
                        <option value="saler">Saler</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary" @click="createUser">Create</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            userCreate: {
                name: null,
                email: null,
                role: 'employee'
            },
            currentUser: {},
            list_users: [],
            errors: {
                name: null,
                email: null,
            }
        }
    },
    created() {

        this.getCurrentUser()
        this.getListUsers()

    },
    methods: {
        getCurrentUser() {
            axios.get('/getCurrentUser')
                .then(response => {
                    this.currentUser = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        getListUsers() {
            axios.get('/users')
                .then(response => {
                    this.list_users = response.data
                    this.list_users.forEach(user => {
                        Vue.set(user, 'isEdit', false)
                    })
                })
                .catch(error => {
                    console.log(error)
                })
        },
        createUser() {
            axios.post('/users', { user: this.userCreate })
                .then(response => {
                    console.log(response)
                    this.userCreate = {}
                    this.getListUsers()
                })
                .catch(error => {
                    console.log(error)
                })
        },
        updateUser(user) {
            axios.put('/users/' + user.id, { id: user.id, name: user.name, email: user.email, role: user.roles[0].name })
                .then(response => {
                    console.log(response.data.result);
                    user.isEdit = false;
                })
                .catch(errors => {
                    if (errors.response.data.errors)
                        console.log(errors.response.data.errors);
                })
        },
        validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }

    },
    computed: {
        checkIsAdmin() {
            if (this.currentUser.roles) {
                let check = false
                this.currentUser.roles.forEach(role => {
                    if (role.name === 'admin') {
                        check = true
                    }
                })
                return check;
            }
        },
        checkCreateUser() {
            this.errors = { name: null, email: null };
            if (this.userCreate.name === "") {
                this.errors.name = 'Name required.';
            } else if (this.userCreate.name != null && this.userCreate.name.length < 6) {
                this.errors.name = 'Name too short';
            }
            if (this.userCreate.email === "") {
                this.errors.email = "Email required.";
            } else if (this.userCreate.email != null && !this.validateEmail(this.userCreate.email)) {
                this.errors.email = 'Valid email required.';
            }
        }
    }
};
</script>
<style lang="scss" scoped>
.errors-create-user>p {
    color: red;
}
</style>