<template>
    <div class="flex">
        <input class="m-3"
               type="checkbox"
               v-model="data.state"
               id="state"
               true-value="done"
               false-value="todo"
               name="state"
               @change="toggleStatus"/>
        <div class="text-blue-900 m-2">{{ todo.description }}</div>
    </div>
</template>

<script>

import TodoDataService from "@/services/TodoDataService";

export default {
    name: "Todo",
    props: {
        todo: {
            id: 0,
            state: '',
            description: '',
            project_id: 0,
        }
    },
    data() {
        return {
            data: {
                id: this.todo.id,
                project_id: this.todo.project_id,
                description: this.todo.description,
                state: this.todo.state,
            }
        }
    },
    methods: {
        toggleStatus() {
            TodoDataService.update(this.data)
                .then(response => {
                    console.log(response.data);
                })
                .catch(e => {
                    console.log(e);
                });
        }
    }
}
</script>

<style scoped>

</style>
