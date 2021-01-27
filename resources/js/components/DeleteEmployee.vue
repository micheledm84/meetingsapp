<template>
    <form method="DELETE" @submit.prevent="deleteEmployee">
        <div class="form-group">
            <h5>Delete an employee</h5>
        </div>
        <div class="form-group">
            <label for="permission">Users:</label>
            <select required v-model="user.information" class="form-control" id="user.informations">
                <option v-for="user in users" :value="{ id: user.id, name: user.name, surname: user.surname, email: user.email, password: user.password, permission: user.permission, language_name: user.language_name }" :key="user.id">
                    {{ user.fullname }}
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input required readonly type="text" v-model="user.information.name" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="surname">Surname:</label>
            <input required readonly type="text" v-model="user.information.surname" class="form-control" id="surname">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input required readonly type="email" v-model="user.information.email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input required readonly type="password" v-model="user.information.password" class="form-control" id="pwd">
        </div>
        <div class="form-group">
            <label for="lang">Language:</label>
            <input required readonly type="text" v-model="user.information.language_name" class="form-control" id="lang">
        </div>
        <!--<div class="form-group">
            <label for="user-languageName">Language:</label>
            <select required readonly v-model="user.information.language" class="form-control" id="user-languageName">
                <option v-for="language in languages" :value="language.id" :key="language.id">
                    {{ language.name }}
                </option>
            </select>
        </div>-->
        <div class="form-group">
            <label for="permission">Permission:</label>
            <input required readonly type="text" v-model="user.information.permission" class="form-control" id="permission">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
            
    </form>
</template>

<script>

    export default {
        components: {
        },
        props: {
            users: {
                type: Array,
                required: true,
                default: () => [],
            }/*,
            languages: {
                type: Array,
                required: true,
                default: () => [],
            }*/
        },
        mounted() {
            console.log('Component mounted.');
            console.log(this.users);
        },
        computed:{
        },
        data: function() {
            return {
                user: {
                    information: "",
                    languageName: ""
                }
            }
        },
        methods: {
            deleteEmployee: function() {
                console.log(this.user.information.id);
                alert(this.user.information.id);
                //axios.post('api/delete_room', this.user.informationRoom)
                axios.delete('api/delete_employee?id=' + this.user.information.id)
                .then((response) => {
                    console.log(response);
                    this.errors = response.data;
                    if (Object.keys(this.errors).length === 0) {
                        //this.success = true;
                        //var el = this.$el.getElementsByClassName("alert-success")[0];
                        alert('viva');
                        this.user = {};
                        //this.formMeeting.participants = [];
                    } else {
                        alert('noviva');
                        //this.success = false;
                    }
                })
                .catch(error => {
                    //this.success = false;
                    alert(noooooo);
                    console.log(error);
                    
                });
            }
        }
    }
</script>