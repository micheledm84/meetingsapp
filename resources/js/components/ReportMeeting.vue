<template>
    <form @submit.prevent="runReport" method="GET">
        <div class="d-flex justify-content-between">
            <div class="form-group">
                <label for="participant">Participant:</label>
                <select required v-model="formReport.participant" class="form-control" id="participant">
                    <option v-for="user in users" :value="user.id" :key="user.id">
                        {{ user.fullname }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="start">Start Date:</label>
                <input v-model="formReport.start" required type="date" class="form-control" id="start">
            </div>
            <div class="form-group">
                <label for="end">End Date:</label>
                <input v-model="formReport.end" required type="date" class="form-control" id="end">
            </div>
            <div class="form-group">
                <label for="room">Room:</label>
                <select required v-model="formReport.room" class="form-control" id="room">
                    <option v-for="room in rooms" :value="room.id" :key="room.id">
                        {{ room.name }}
                    </option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            
        </div>
        
    </form>
</template>

<script>

    export default {
        components: {
        },
        mounted() {
            console.log('Component mounted.');
            this.loadUsers();
            this.loadRooms();
        },
        computed:{
        },
        data: function() {
            return {
                success: true,
                failure: true,
                users: [],
                rooms: [],
                meetingsReport: {},
                formReport: {
                    room: '',
                    start: '',
                    end: '',
                    participant: ''
                },
                errors: {},
            }
        },
        methods: {
            loadUsers: function() {
                axios.get('api/users')
                .then((response) => {
                    this.users = response.data.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
            },
            loadRooms: function() {
                axios.get('api/rooms')
                .then((response) => {
                    this.rooms = response.data.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
            },
            
            runReport: function() {
                const url = "api/get_report?room="+this.formReport['room']+"&participant="+this.formReport['participant']+"&start="+this.formReport['start']+"&end="+this.formReport['end'];
                axios.get(url)
                .then((response) => {
                    console.log(response.data.data);
                    this.meetingsReport = response.data.data;
                    this.$emit('pass-meetings', this.meetingsReport);
                    this.$emit('success');
                    this.errors = {};
                })
                .catch(error => {
                    console.log(error.response.data);
                    this.errors = error.response.data; 
                    this.$emit('failure');
                    this.$emit('pass-errors', this.errors); 
                    console.log('call ended');
                                
                });
            }
        }
    }
</script>