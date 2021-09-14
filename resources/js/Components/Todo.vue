<template>
    <div class="flex">
        <input type="radio" v-model="todo.state" name="todo.id" value="done" @change="toggleStatus"/>
        <div class="title">{{ todo.description }}</div>
    </div>
</template>

<script>

import TodoDataService from "@/services/TodoDataService";

export default {
    name: "Todo",
    props: {
        todo: {
            id: 0,
            state: 'todo',
            description: '',
            project: Object,
        }
    },
    methods: {
        toggleStatus() {
            TodoDataService.update(this.todo)
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
