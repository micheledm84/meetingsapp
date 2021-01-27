<template>
    <div>
        <admin-operations @pass-operations="onPassOperations"></admin-operations>    
        <hr>
        <insert-employee v-if="operationNumber == 1" :languages="languages" :permissions="permissions" ></insert-employee>
        <edit-employee v-if="operationNumber == 2" :languages="languages" :permissions="permissions" :users="users"></edit-employee>
        <delete-employee v-if="operationNumber == 3" :users="users"></delete-employee>
        <insert-room v-if="operationNumber == 4"></insert-room>
        <edit-room v-if="operationNumber == 5" :rooms="rooms"></edit-room>
        <delete-room v-if="operationNumber == 6" :rooms="rooms"></delete-room>
    </div>
</template>

<script>
    import AdminOperations from "./AdminOperations.vue"
    import InsertEmployee from "./InsertEmployee.vue"
    import EditEmployee from "./EditEmployee.vue"
    import DeleteEmployee from "./DeleteEmployee.vue"
    import InsertRoom from "./InsertRoom.vue"
    import EditRoom from "./EditRoom.vue"
    import DeleteRoom from "./DeleteRoom.vue"
    /*import ReportMeeting from "./ReportMeeting.vue"
    import ValidatedErrors from "./ValidatedErrors.vue"*/

    export default {
        components: {
            'admin-operations': AdminOperations,
            'insert-employee': InsertEmployee,
            'edit-employee': EditEmployee,
            'delete-employee': DeleteEmployee,
            'insert-room': InsertRoom,
            'edit-room': EditRoom,
            'delete-room': DeleteRoom 
            /*,
            'report-meeting': ReportMeeting,
            'validated-errors': ValidatedErrors*/
        },
        props: ['permissions', 'users', 'rooms', 'languages'],
        mounted() {
            console.log('Component mounted.');

        },
        data: function() {
            return {
                operationNumber: 0
                //permissions: JSON.parse(this.permissions)
                /*displayTable: false,
                meetingsSelected: {},
                errorsMeeting: []*/
            }
        },
        methods: {
            onPassOperations(value) {
                //console.log(value) 
                //alert(value);
                this.operationNumber = value;
            }/*
            onPassErrors(value) {
                console.log('errors passed');
                const values = Object.values(value);
                this.errorsMeeting = values;
            }*/
        }
    }
</script>