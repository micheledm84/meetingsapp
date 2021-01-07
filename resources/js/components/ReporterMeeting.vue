<template>
    <div>
        <report-meeting @pass-meetings="onPassMeetings" @pass-errors="onPassErrors" @failure="displayTable=false" @success="displayTable=true"></report-meeting>
        <hr>
        <validated-errors :errorsMeeting="errorsMeeting" v-if="displayTable===false"></validated-errors>
        <table-report :meetingsSelected="meetingsSelected" v-if="displayTable===true"></table-report>
    </div>
</template>

<script>
    import TableReport from "./TableReport.vue"
    import ReportMeeting from "./ReportMeeting.vue"
    import ValidatedErrors from "./ValidatedErrors.vue"

    export default {
        components: {
            'table-report': TableReport,
            'report-meeting': ReportMeeting,
            'validated-errors': ValidatedErrors
        },
        mounted() {
            console.log('Component mounted.');
        },
        data: function() {
            return {
                displayTable: false,
                meetingsSelected: {},
                errorsMeeting: []
            }
        },
        methods: {
            onPassMeetings(value) {
                console.log(value) 
                this.meetingsSelected = value;
            },
            onPassErrors(value) {
                console.log('errors passed');
                const values = Object.values(value);
                this.errorsMeeting = values;
                //alert(this.errorsMeeting[0]);
            }
        }
    }
</script>