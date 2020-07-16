<template>

    <tr>
        <th scope="row">
            <input type="checkbox" :id="'checkbox-' + employee.id" v-model="employee.check" :value="employee.id" @change="selectToDelete">
        </th>
        <td>
            <a :href="employee.edit_url"  v-html="employee.name"></a>
        </td>
        <td v-html="employee.email"></td>
        <td v-html="employee.position_name"></td>
        <td v-html="employee.contact"></td>
    </tr>

    
</template>

<script>
    export default {
        props: {
            employee:Object
        },
        data() {
            return {
                
            }
        },
        mounted() {
        },
        methods: {
            selectToDelete (event) {
                let selected = {id: this.employee.id, isCheck: this.employee.check}
                this.$emit('select', selected)
            },
        },
    }

</script>
