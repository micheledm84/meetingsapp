<template>
    <form method="POST">
        <div class="form-group">
            <h5>Edit an employee</h5>
        </div>
        <div class="form-group">
            <label for="user.informations">Users:</label>
            <select required v-model="user.information" @change="onChangeUser" class="form-control" id="user.informations">
                <option v-for="user in users" :value="user.id" :key="user.id">
                    {{ user.fullname }}
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input required :readonly="readonlyInput === true" v-model="userName" type="text" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="surname">Surname:</label>
            <input required :readonly="readonlyInput === true" v-model="userSurname" type="text" class="form-control" id="surname">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input required type="email" :readonly="readonlyInput === true" v-model="userEmail" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input required type="password" :readonly="readonlyInput === true" v-model="userPassword" class="form-control" id="pwd">
        </div>
        <div class="form-group">
            <label for="user-languageName">Language:</label>
            <select required v-model="user.languageName" :disabled="disabledInput === true" :readonly="readonlyInput === true" class="form-control" id="user-languageName">
                <option v-for="language in languages" :value="language.id" :key="language.id">
                    {{ language.name }}
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="permission">Permission:</label>
            <select required v-model="user.permissionId" :disabled="disabledInput === true" :readonly="readonlyInput === true" class="form-control" id="user-permissionId">
                <option v-for="permission in permissions" :value="permission.id" :key="permission.id">
                    {{ permission.id }}
                </option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<script>

    export default {
        components: {
        },
        props: {
            permissions: {
                type: Array,
                required: true,
                default: () => [],
            },
            languages: {
                type: Array,
                required: true,
                default: () => [],
            },
            users: {
                type: Array,
                required: true,
                default: () => [],
            }
        },
        mounted() {
            console.log('Component mounted.');
        },
        computed:{
        },
        data: function() {
            return {
                user: {
                    languageName: "",
                    permissionId: "",
                    information: ""
                },
                userName: "",
                userSurname: "",
                userEmail: "",
                userPassword: "",
                readonlyInput: true,
                disabledInput: true
            }
        },
        methods: {
            onChangeUser(event) {
                
                const index = event.target.options.selectedIndex;

                this.userName = this.users[index].name;
                this.userSurname = this.users[index].surname;
                this.userEmail = this.users[index].email;
                this.userPassword = this.users[index].password;
                this.user.permissionId = this.users[index].permission;
                //alert(this.users[index].language_name);
                this.user.languageName = this.users[index].language_id;
                
                this.readonlyInput = false;
                this.disabledInput = false;
            }
        }
    }
</script>