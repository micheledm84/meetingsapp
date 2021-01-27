<template>
    <form @submit.prevent="runReport" method="GET">
        <div class="d-flex justify-content-between">
            <div class="form-group">
                <label for="operation">Operation:</label>
                <select class="form-control" @change="onChange($event)" v-model="selectOperations" id="operations">
                    <option value="0" key="0"></option>
                    <option value="1" key="1">insert employee</option>
                    <option value="2" key="2">edit employee</option>
                    <option value="3" key="3">delete employee</option>
                    <option value="4" key="4">insert room</option>
                    <option value="5" key="5">edit room</option>
                    <option value="6" key="6">delete room</option>
                </select>
            </div>
        </div>
        
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
                selectOperations: 0
            }
        },
        methods: {
            onChange(event) {
                //alert(event.target.value);
                //alert("viva");
                this.$emit('pass-operations', this.selectOperations);
            }
        }
    }
</script>