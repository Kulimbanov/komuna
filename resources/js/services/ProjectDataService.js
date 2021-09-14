import http from "../http-common";

class ProjectDataService {
    getAll(userId) {
        return http.get("/project?userId=" + userId);
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
