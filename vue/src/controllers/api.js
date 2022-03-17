const API_BASE = "http://127.0.0.1:8000/api";

export default {
    FetchSubjects: () => {
        return fetch(API_BASE + "/subjects/all")
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                return data.response.subjects;
            } else {
                throw data.response.error;
            }

        })
        .catch(err => {
            alert(err);
        }); 
    },

    FetchSubject: id => {
        if (id != null) {
            return fetch(API_BASE + "/subjects/" + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    return data.response.subject;
                } else {
                    throw data.response.error;
                }
            })
            .catch(err => {
                alert(err)
            });
        }
    },

    CreateSubject: (Subject_Code = "", Subject_Name = "", Subject_Type = "", Units = "") => {
        if (
            Subject_Code == "" || 
            Subject_Name == "" || 
            Subject_Type == "" ||
            Units == ""

        ) {
            return false;
        }

        return fetch(API_BASE + "/subjects/create", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ Subject_Code, Subject_Name, Subject_Type, Units})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("New record has been saved.");
                return data.response.subject;
            } else {
                throw data.response.error;
            }
        })
        .catch(err => {
            alert(err);
        });
    },
    DeleteSubject: id => {
        if (id != null) {
            return fetch(API_BASE + "/subjects/delete/" + id, {
                method: "DELETE"
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success){
                        alert("Subject removed Successfully.");
                        return true;
                    } else {
                        throw data.response.error;
                    }
                })
                .catch(err => {
                    alert(err);
                });
        }
    },
    UpdateSubject: (Subject_Code = "", Subject_Name = "", Subject_Type = "", Units = "", id = "") => {
        if (
            Subject_Code == "" ||
            Subject_Name == "" ||
            Subject_Type == "" ||
            Units == "" ||
            id == ""
        ) {
            return false;
        }

        return fetch(API_BASE + "/subjects/update/" + id, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ Subject_Code, Subject_Name, Subject_Type, Units})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Updated Successfully.");
                return data.response.subject;
            } else {
                throw data.response.error;
            }
        })
        .catch(err => {
            alert(err);
        });
    },

    FetchColleges: () => {
        return fetch(API_BASE + "/colleges/all")
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                return data.response.colleges;
            } else {
                throw data.response.error;
            }

        })
        .catch(err => {
            alert(err);
        }); 
    },

    FetchCourses: () => {
        return fetch(API_BASE + "/courses/all")
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                return data.response.courses;
            } else {
                throw data.response.error;
            }

        })
        .catch(err => {
            alert(err);
        }); 
    },

    FetchCourse: id => {
        if (id != null) {
            return fetch(API_BASE + "/courses/" + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    return data.response.course;
                } else {
                    throw data.response.error;
                }
            })
            .catch(err => {
                alert(err)
            });
        }
    },

    CreateCourse: (Course_Code = "", Course_Name = "", college_id = "") => {
        if (
            Course_Code == "" || 
            Course_Name == "" ||
            college_id == ""

        ) {
            return false;
        }

        return fetch(API_BASE + "/courses/create", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ Course_Code, Course_Name, college_id})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("New record has been saved.");
                return data.response.course;
            } else {
                throw data.response.error;
            }
        })
        .catch(err => {
            alert(err);
        });
    },
    DeleteCourse: id => {
        if (id != null) {
            return fetch(API_BASE + "/courses/delete/" + id, {
                method: "DELETE"
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success){
                        alert("Course removed Successfully.");
                        return true;
                    } else {
                        throw data.response.error;
                    }
                })
                .catch(err => {
                    alert(err);
                });
        }
    },
    UpdateCourse: (Course_Code = "", Course_Name = "", college_id = "", id = "") => {
        if (
            Course_Code == "" ||
            Course_Name == "" ||
            college_id == "" ||
            id == ""
        ) {
            return false;
        }

        return fetch(API_BASE + "/courses/update/" + id, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ Course_Code, Course_Name, college_id})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Updated Successfully.");
                return data.response.course;
            } else {
                throw data.response.error;
            }
        })
        .catch(err => {
            alert(err);
        });
    },
    FetchFaculties: () => {
        return fetch(API_BASE + "/faculties/all")
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                return data.response.faculties;
            } else {
                throw data.response.error;
            }

        })
        .catch(err => {
            alert(err);
        }); 
    },

    FetchFaculty: id => {
        if (id != null) {
            return fetch(API_BASE + "/faculties/" + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    return data.response.faculty;
                } else {
                    throw data.response.error;
                }
            })
            .catch(err => {
                alert(err)
            });
        }
    },

    CreateFaculty: (Faculty_ID = "", Faculty_Name = "", college_id = "") => {
        if (
            Faculty_ID == "" || 
            Faculty_Name == "" ||
            college_id == ""

        ) {
            return false;
        }

        return fetch(API_BASE + "/faculties/create", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ Faculty_ID, Faculty_Name, college_id})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("New record has been saved.");
                return data.response.faculty;
            } else {
                throw data.response.error;
            }
        })
        .catch(err => {
            alert(err);
        });
    },
    DeleteFaculty: id => {
        if (id != null) {
            return fetch(API_BASE + "/faculties/delete/" + id, {
                method: "DELETE"
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success){
                        alert("Faculty removed Successfully.");
                        return true;
                    } else {
                        throw data.response.error;
                    }
                })
                .catch(err => {
                    alert(err);
                });
        }
    },
    UpdateFaculty: (Faculty_ID = "", Faculty_Name = "", college_id = "", id = "") => {
        if (
            Faculty_ID == "" ||
            Faculty_Name == "" ||
            college_id == "" ||
            id == ""
        ) {
            return false;
        }

        return fetch(API_BASE + "/faculties/update/" + id, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ Faculty_ID, Faculty_Name, college_id})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Updated Successfully.");
                return data.response.faculty;
            } else {
                throw data.response.error;
            }
        })
        .catch(err => {
            alert(err);
        });
    },
    FetchClassrooms: () => {
        return fetch(API_BASE + "/classrooms/all")
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                return data.response.classrooms;
            } else {
                throw data.response.error;
            }

        })
        .catch(err => {
            alert(err);
        }); 
    },

    FetchClassroom: id => {
        if (id != null) {
            return fetch(API_BASE + "/classrooms/" + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    return data.response.classroom;
                } else {
                    throw data.response.error;
                }
            })
            .catch(err => {
                alert(err)
            });
        }
    },

    CreateClassroom: (Building_No = "", Classroom_No = "", Classroom_Type = "", college_id = "") => {
        if (
            Building_No = "" ||
            Classroom_No == "" || 
            Classroom_Type == "" ||
            college_id == ""

        ) {
            return false;
        }

        return fetch(API_BASE + "/classrooms/create", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ Building_No, Classroom_No, Classroom_Type, college_id})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("New record has been saved.");
                return data.response.classroom;
            } else {
                throw data.response.error;
            }
        })
        .catch(err => {
            alert(err);
        });
    },
    DeleteClassroom: id => {
        if (id != null) {
            return fetch(API_BASE + "/classrooms/delete/" + id, {
                method: "DELETE"
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success){
                        alert("Classroom removed Successfully.");
                        return true;
                    } else {
                        throw data.response.error;
                    }
                })
                .catch(err => {
                    alert(err);
                });
        }
    },
    UpdateClassroom: (Building_No = "", Classroom_No = "", Classroom_Type = "", college_id = "", id = "") => {
        if (
            Building_No = "" ||
            Classroom_No == "" ||
            Classroom_Type == "" ||
            college_id == "" ||
            id == ""
        ) {
            return false;
        }

        return fetch(API_BASE + "/classrooms/update/" + id, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ Building_No, Classroom_No, Classroom_Type, college_id})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Updated Successfully.");
                return data.response.classroom;
            } else {
                throw data.response.error;
            }
        })
        .catch(err => {
            alert(err);
        });
    }

}