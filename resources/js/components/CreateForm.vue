<template>
    <!--<div class="container" :class="{'loading': loading}">-->
    <div class="container" :class="{'loading': loading}">
        <h2>hours</h2>
        <p>The .table-striped class adds zebra-stripes to a table:</p>            
        <form @submit.prevent="insertMeeting" method="POST">
            <div class="alert alert-success" v-show="success">The meeting has been created.</div>
            <div class="form-group">
                <label for="participants">Participants:</label>
                <select v-model="formMeeting.participants" multiple class="form-control" id="participants">
                    <option v-for="user in users" :value="user.id" :key="user.id">
                        {{ user.fullname }}
                    </option>
                </select>
                <div class="alert alert-danger" v-if="errors && errors.participants">{{ errors.participants[0] }}</div>

            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea v-model="formMeeting.description" class="form-control" id="description" rows="3"></textarea>
                <div class="alert alert-danger" v-if="errors && errors.description">{{ errors.description[0] }}</div>

            </div>
            <div class="form-group">
                <label for="room">Room:</label>
                <select v-model="formMeeting.room" class="form-control" id="room">
                    <option v-for="room in rooms" :value="room.id" :key="room.id">
                        {{ room.name }}
                    </option>
                </select>
                <div class="alert alert-danger" v-if="errors && errors.room">{{ errors.room[0] }}</div>

            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input v-model="formMeeting.date" type="date" class="form-control" id="date">
                <div class="alert alert-danger" v-if="errors && errors.date">{{ errors.date[0] }}</div>

            </div>
            <div class="form-group">
                <label for="start">Start Hour:</label>
                <select v-model="formMeeting.start" class="form-control" id="start">
                    <option v-for="(hour, index) in hours" :key="index">
                        {{ hour }}
                    </option>
                </select>
                <div class="alert alert-danger" v-if="errors && errors.start">{{ errors.start[0] }}</div>

            </div>
            <div class="form-group">
                <label for="end">End Hour:</label>
                <select v-model="formMeeting.end" class="form-control" id="end">
                    <option v-for="(hour, index) in hours" :key="index">
                        {{ hour }}
                    </option>
                </select>
                <div class="alert alert-danger" v-if="errors && errors.end">{{ errors.end[0] }}</div>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</template>

<script>
    export default {
        props: ['hours'],
        mounted() {
            console.log('Component mounted.');
            this.loadUsers();
            this.loadRooms();
        },
        data: function() {
            return {
                users: [],
                rooms: [],
                formMeeting: {
                    room: '',
                    start: '',
                    end: '',
                    date: '',
                    description: '',
                    participants: []
                },
                errors: {},
                success: false
                
            }
        },
        methods: {
            loadUsers: function() {
                axios.get('api/users')
                .then((response) => {
                    this.users = response.data.data;
                })
                .catch(function(error) {
                    alert('noviva');
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
            insertMeeting: function() {
                axios.post('api/store_meeting', this.formMeeting)
                .then((response) => {
                    this.errors = response.data;
                    if (Object.keys(this.errors).length === 0) {
                        this.success = true;
                        formMeeting = {};
                    } else {
                        this.success = false;
                    }
                })
                .catch(function(error) {
                    this.success = false;
                    console.log(error);
                    
                });
            }
        }
    }
</script>