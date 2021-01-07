<template>

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
            <tr v-for="meeting in meetingsSelected" :key="meeting.id">
                <td>{{ meeting.id }}</td>
                <td>{{ meeting.participants }}</td>
                <td>{{ meeting.description }}</td>
                <td>{{ meeting.room }}</td>
                <td>{{ meeting.date }}</td>
                <td>{{ meeting.start }}</td>
                <td>{{ meeting.end }}</td>
                <td><button v-bind:id="meeting.id" type="button" class="btn-primary" @click="editMeeting(meeting.id)">Edit</button></td>
                <td><button v-bind:id="meeting.id" type="button" class="btn-danger" @click="deleteMeeting(meeting.id)">Delete</button></td>
            </tr>
        </tbody>
    </table>   
</template>

<script>

    export default {
        props: ['meetingsSelected'],
        mounted() {
            console.log('Component mounted.');
        },
        data: function() {
            return {
            }
        },
        methods: {
        }
    }
</script>