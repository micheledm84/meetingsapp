<template>
    <!--<div class="container" :class="{'loading': loading}">-->
    <div class="container" :class="{'loading': loading}">
        <h2>Striped Rows</h2>
        <p>The .table-striped class adds zebra-stripes to a table:</p>            
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Participants</th>
                <th>Description</th>
                <th>Room</th>
                <th>Date</th>
                <th>Start</th>
                <th>End</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="meeting in meetings" :key="meeting.id">
                <td>{{ meeting.id }}</td>
                <td>{{ meeting.participants }}</td>
                <td>{{ meeting.description }}</td>
                <td>{{ meeting.room_id }}</td>
                <td>{{ meeting.date }}</td>
                <td>{{ meeting.start }}</td>
                <td>{{ meeting.end }}</td>
                <td><button v-bind:id="meeting.id" type="button" class="btn-primary" @click="editMeeting(meeting.id)">Edit</button></td>
                <td><button v-bind:id="meeting.id" type="button" class="btn-danger" @click="deleteMeeting(meeting.id)">Delete</button></td>
            </tr>
            </tbody>
        </table>
    </div>
        <!--<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Examplessss Component</div>

                    <div class="card-body">
                        I'm an example cossssmponent.
                    </div>
                </div>
            </div>
        </div>-->
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
            this.loadMeetings();
            /*this.loadUsers();
            this.loadMeetingUser();*/
        },
        data: function() {
            return {
                meetings: [],
                meeting_user: [],
                users: [],
                //loading: true
            }
        },
        methods: {
            loadMeetings: function() {
                axios.get('api/meetings')
                .then((response) => {
                    this.meetings = response.data.data;
                })
                .catch(function(error) {
                    alert('noviva');
                    console.log(error);
                });
            },
            editMeeting: function(id) {
                alert(id);
            },
            deleteMeeting: function(id) {
                alert(id);
            }
        }
    }
</script>