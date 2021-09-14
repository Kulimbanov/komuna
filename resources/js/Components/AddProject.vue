<template>
    <div class="submit-form">
        <div v-if="!submitted">
            <div class="form-group">
                <label for="name">Project name:</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    required
                    v-model="project.name"
                    name="name"
                />
            </div>

            <button @click="saveProject" class="btn btn-success">Submit</button>
        </div>

        <div v-else>
            <h4>Project is submitted successfully!</h4>
            <button class="btn btn-success" @click="newProject">Add</button>
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
    computed() {
        console.log(this.userId);
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
                    console.log(response.data);
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
