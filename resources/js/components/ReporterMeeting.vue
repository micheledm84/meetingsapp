<template>
    <div>
        <!-- listen for `success` events from report-meeting -->
        <!--<report-meeting @success="displayTable=true"></report-meeting>-->
        <report-meeting @failure="displayTable=false" @success="displayTable=true"></report-meeting>
        <hr>
        <!-- only displays when displayTable == true -->
        <table-report v-if="displayTable===true"></table-report>
    </div>
</template>

<script>
    import TableReport from "./TableReport.vue"
    import ReportMeeting from "./ReportMeeting.vue"

    export default {
        components: {
            'table-report': TableReport,
            'report-meeting': ReportMeeting
        },
        mounted() {
            console.log('Component mounted.');
        },
        data: function() {
            return {
                //success: true,
                //errors: {},
                displayTable: false
            }
        },
        methods: {
        }
    }
</script>