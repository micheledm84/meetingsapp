<template>
    <form @submit.prevent="runReport" method="GET">
        <div class="d-flex justify-content-between">
            <div class="form-group">
                <label for="participant">Participant:</label>
                <select v-model="formReport.participant" class="form-control" id="participant">
                    <option v-for="user in users" :value="user.id" :key="user.id">
                        {{ user.fullname }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="start">Start Date:</label>
                <input v-model="formReport.start" type="date" class="form-control" id="start">
            </div>
            <div class="form-group">
                <label for="end">End Date:</label>
                <input v-model="formReport.end" type="date" class="form-control" id="end">
            </div>
            <div class="form-group">
                <label for="room">Room:</label>
                <select v-model="formReport.room" class="form-control" id="room">
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
    import TableReport from "./TableReport.vue"
    //import Footer from "./Footer.vue"

    export default {
        components: {
            'table-report': TableReport
        },
        mounted() {
            console.log('Component mounted.');
            this.loadUsers();
            this.loadRooms();
        },
        data: function() {
            return {
                success: true,
                failure: true,
                users: [],
                rooms: [],
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
                    //alert('noviva');
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
                //const url = "http://localhost/meetingsapp/public/api/get_report?room="+this.formReport['room']+"&participant="+this.formReport['participant']+"&start="+this.formReport['start']+"&end="+this.formReport['end'];
                const url = "api/get_report?room="+this.formReport['room']+"&participant="+this.formReport['participant']+"&start="+this.formReport['start']+"&end="+this.formReport['end'];

                /*alert(this.formReport['start']);
                alert(this.formReport['end']);
                alert(this.formReport['room']);
                alert(this.formReport['participant']);*/
                //axios.post('api/get_report', this.formReport)
                axios.get(url)
                .then((response) => {
                    this.errors = response.data;
                    if (Object.keys(this.errors).length === 0) {
                        alert('viva');
                        //this.success = true;
                        this.$emit('success');
                        //formReport = {};
                    } else {
                        alert('vivano');
                        this.$emit('failure');
                        //this.success = false;
                        //this.$emit('success');
                    }
                })
                .catch(function(error) {
                    alert('noviva');
                    this.$emit('failure');
                    //this.success = false;
                    console.log(error);
                });
            }
        }
    }
</script>