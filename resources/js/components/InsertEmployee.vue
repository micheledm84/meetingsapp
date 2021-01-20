<template>
    <form method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input required type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input required type="text" class="form-control" id="surname">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input required type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input required type="password" class="form-control" id="pwd">
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
                    permissionId: "",
                }
            }
        },
        methods: {
        }
    }
</script>