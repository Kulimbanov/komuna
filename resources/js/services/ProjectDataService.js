import http from "../http-common";

class ProjectDataService {
    getAll() {
        return http.get("/project");
    }

    create(data) {
        return http.post("/project", data);
    }

    update(id, data) {
        return http.put(`/project/${id}`, data);
    }

    delete(id) {
        return http.delete(`/project/${id}`);
    }
}

export default new ProjectDataService();
