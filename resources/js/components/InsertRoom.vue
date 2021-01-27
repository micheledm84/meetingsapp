<template>
    <form method="POST" @submit.prevent="insertRoom">
            <div class="form-group">
                <h5>Insert a new room</h5>
            </div>
            <div class="form-group">
                <label for="room-name">Name:</label>
                <input type="text" v-model="formRoom.name" class="form-control" id="room-name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</template>

<script>

    export default {
        components: {
        },
        mounted() {
            console.log('Component mounted.');
        },
        computed:{
            
        },
        data: function() {
            return {
                errors: {},
                formRoom: {
                    name: ''
                }
            }
        },
        methods: {
            insertRoom: function() {
                alert(this.formRoom.name);
                axios.post('api/store_room', this.formRoom)
                .then((response) => {
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