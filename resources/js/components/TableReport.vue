<template>

    <table class="table">
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
            </tr>
            <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
            </tr>
            <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
            </tr>
        </tbody>
    </table>   
</template>

<script>
    //import TableReport from "./TableReport.vue"
    //import Footer from "./Footer.vue"

    export default {
        props: ['success'],
        /*components: {
            'table-report': TableReport
        },*/
        mounted() {
            console.log('Component mounted.');
        },
        data: function() {
            return {
                //success: false
            }
        },
        methods: {
        }
    }
</script>