<template>
    <form method="DELETE" @submit.prevent="deleteRoom">
        <div class="form-group">
            <h5>Delete a room</h5>
        </div>
        <label for="permission">Room:</label>
            <select required v-model="user.informationRoom" class="form-control" id="user-information-room">
                <option v-for="room in rooms" :value="{ id: room.id, name: room.name }" :key="room.id">
                    {{ room.name }}
                </option>
            </select>
        <div class="form-group">
            <label for="name">Name:</label>
            <input required readonly v-model="user.informationRoom.name" type="text" class="form-control" id="name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
            
    </form>
</template>

<script>

    export default {
        components: {
        },
        props: {
            rooms: {
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
                    informationRoom: ""
                }
            }
        },
        methods: {
            deleteRoom: function() {
                alert(this.user.informationRoom.id);
                //axios.post('api/delete_room', this.user.informationRoom)
                axios.delete('api/delete_room?id=' + this.user.informationRoom.id)
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