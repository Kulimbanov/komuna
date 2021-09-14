<template>
    <div class="submit-form">
        <div v-if="!submitted" class="flex">
            <div class="form-group">
                <label for="name">Project name:</label>
                <input
                    type="text"
                    class="form-control m-2"
                    id="name"
                    required
                    v-model="project.name"
                    name="name"
                />
            </div>

            <button @click="saveProject" class="m-auto mr-2 text-red-700">Submit</button>
        </div>

        <div v-else class="flex">
            <h4>Project is submitted successfully!</h4>
            <button class="m-auto mr-2 text-red-700" @click="newProject">Create new</button>
        </div>
    </div>
</template>

<script>
import ProjectDataService from "@/services/ProjectDataService";

export default {
    name: "AddProject",
    props: {
        userId: null
    },
    data() {
        return {
            submitted: false,
            project: {
                id: null,
                user_id: this.userId,
                name: "",
            }
        }
    },
    methods: {
        saveProject() {
            var data = {
                name: this.project.name,
                user_id: this.userId,
            };
            ProjectDataService.create(data)
                .then(response => {
                    this.project.id = response.data.id;
                    this.$emit('reloadProjects');
                    this.submitted = true;
                })
                .catch(e => {
                    console.log(e);
                });
        },
        newProject() {
            this.submitted = false;
            this.project = {};
        }
    }
}
</script>

<style scoped>

</style>
