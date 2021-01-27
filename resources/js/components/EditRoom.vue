<template>
    <form method="PUT" @submit.prevent="editRoom">
        <div class="form-group">
            <h5>Edit a room</h5>
        </div>
        <label for="permission">Room:</label>
            <select required v-model="user.informationRoom" @change="onChangeRoom" class="form-control" id="user-information-room">
                <option v-for="room in rooms" :value="room.id" :key="room.id">
                    {{ room.name }}
                </option>
            </select>
        <div class="form-group">
            <label for="new-name">New name:</label>
            <input required type="text" :readonly="readonlyInput === true" v-model="roomName" class="form-control" id="new-name">
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
                },
                roomName: "",
                readonlyInput: true,
                /*roomToSend: {
                    id: "",
                    name: ""
                },*/
                //index: ''
            }
        },
        methods: {
            onChangeRoom(event) {
                this.index = event.target.options.selectedIndex;
                this.roomName = event.target.options[event.target.options.selectedIndex].text;
                this.readonlyInput = false;
                //this.roomToSend['id'] = this.rooms[this.index].id;
                //this.roomToSend['name'] = this.roomName;
                //alert(this.roomName);
                //this.roomToSend.name = this.roomName;
                /*alert(this.rooms[index].id);
                alert(this.rooms[index].name);*/

                
            },
            editRoom: function() {
                /*alert(this.roomToSend.id);
                alert(this.roomToSend.name);*/
                /*alert(this.roomToSend.id);
                alert(this.roomToSend.name);*/
                axios.put('api/edit_room', { id: this.rooms[this.index].id, name: this.roomName })
                //axios.post('api/edit_room', { id: this.rooms[this.index].id, name: this.roomName })

                //axios.post('api/edit_room', this.roomToSend)
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