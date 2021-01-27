<template>
    <form method="POST" @submit.prevent="insertEmployee">
            <div class="form-group">
                <h5>Insert a new employee</h5>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input required type="text" v-model="user.name" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input required type="text" v-model="user.surname" class="form-control" id="surname">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input required type="email" v-model="user.email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input required type="password" v-model="user.password" class="form-control" id="pwd">
            </div>
            <div class="form-group">
                <label for="language-name">Language:</label>
                <select required v-model="user.languageName" class="form-control" id="language-name">
                    <option v-for="language in languages" :value="language.id" :key="language.id">
                        {{ language.name }}
                    </option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="permission">Permission:</label>
                <select required v-model="user.permissionId" class="form-control" id="user-permissionId">
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
                    name: '',
                    surname: '',
                    email: '',
                    password: ''//,
                    //language: ''
                }
            }
        },
        methods: {
            insertEmployee: function() {
                console.log(this.user);
                alert(this.user.permissionId);
                axios.post('api/store_employee', this.user)
                .then((response) => {
                    console.log(response.data.data);
                    this.errors = response.data;
                    if (Object.keys(this.errors).length === 0) {
                        //this.success = true;
                        //var el = this.$el.getElementsByClassName("alert-success")[0];
                        alert('viva');
                        this.formRoom = {};
                        //this.formMeeting.participants = [];
                    } else {
                        alert('noviva');
                        //this.success = false;
                    }
                })
                .catch(error => {
                    //this.success = false;
                    //alert(noooooo);
                    console.log(error);
                    
                });
            }
        }
    }
</script>