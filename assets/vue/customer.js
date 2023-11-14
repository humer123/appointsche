const { createApp } = Vue;

createApp({
    data() {
        return {
            Snumber: '',
            model: '',
            year: '',
            licPlaNum: '',
            selectedVehicleId: '',
            updateSnumber: '',
            updatemodel: '',
            updateyear: '',
            updatelicPlaNum: '',
            fullname: '',
            email: '',
            ORNumber: '',
            wheel: '',
            engineNumber: '',
            dateAppointment: '',
            seriesModel: '',
            registeredVehicle: 0,
            yearModel: '',
            searchAVehicle: null,
            allVehicle: [],
            selectedVehicle: [],
            scheduleInACart: [],
            users: [],
            selectedUser: [],
            toShowAllVehicle: false,
        }
    },
    methods: {
        user: function () {
            const vue = this;
            var data = new FormData();
            data.append("Method", "user");
            axios.post('../Backend/mainRoutes.php', data)
                .then(function (r) {
                    vue.users = [];

                    for (var v of r.data) {
                        vue.users.push({
                            user_id: v.user_id,
                            profile: v.profile,
                            fullname: v.fullname,
                            email: v.email,
                            password: v.password,
                            role: v.role,
                            status: v.status,
                            created: v.created,
                            updated: v.updated,
                        })
                    }

                });
        },
        storeVehicle: function () {
            if (this.Snumber.length >= 17) {
                const vue = this;
                var data = new FormData();
                data.append("Method", "storeVehicle");
                data.append("Snumber", vue.Snumber);
                data.append("model", vue.model);
                data.append("year", vue.year);
                data.append("licPlaNum", vue.licPlaNum);
                axios.post('../Backend/mainRoutes.php', data)
                    .then(function (r) {
                        if (r.data == 200) {
                            vue.getAllVehicle();
                        } else {
                            alert(r.data);
                        }
                    });
            } else {
                alert('Serial Number is invalid');
            }
        },
        getAllVehicle: function () {
            const vue = this;
            var data = new FormData();
            data.append("Method", "allVehicle");
            axios.post('../Backend/mainRoutes.php', data)
                .then(function (r) {
                    vue.registeredVehicle = r.data.length;

                    vue.allVehicle = [];

                    for (var v of r.data) {
                        vue.allVehicle.push({
                            vehicle_id: v.vehicle_id,
                            user_id: v.user_id,
                            model: v.model,
                            seriesNumber: v.seriesNumber,
                            year: v.year,
                            licPlaNum: v.licPlaNum,
                            created: v.created,
                            updated: v.updated,
                        })
                    }
                    if(r.data == ''){
                        vue.toShowAllVehicle = false;
                    }else{
                        vue.toShowAllVehicle = true;
                    }
                });
        },
        getAllSelectedVehicle: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("Method", "allVehicle");
            axios.post('../Backend/mainRoutes.php', data)
                .then(function (r) {
                    vue.selectedVehicle = [];

                    for (var v of r.data) {
                        if (v.vehicle_id == id) {
                            vue.selectedVehicleId = v.vehicle_id;
                            vue.updateSnumber = v.seriesNumber;
                            vue.updatemodel = v.model;
                            vue.updateyear = v.year;
                            vue.updatelicPlaNum = v.licPlaNum;
                        }
                    }

                });
        },
        deleteVehicle: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("Method", "deleteVehicle");
            data.append("vehicleId", id);
            axios.post('../Backend/mainRoutes.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        vue.getAllVehicle();
                    } else {
                        alert(r.data);
                    }

                });
        },
        updateVehicle: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("Method", "updateVehicle");
            data.append("vehicleId", id);
            data.append("updateSnumber", vue.updateSnumber);
            data.append("updatemodel", vue.updatemodel);
            data.append("updateyear", vue.updateyear);
            data.append("updatelicPlaNum", vue.updatelicPlaNum);
            axios.post('../Backend/mainRoutes.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        vue.getAllVehicle();
                    } else {
                        alert(r.data);
                    }

                });
        },
        getSchedule: function () {
            const vue = this;
            var data = new FormData();
            data.append("Method", "viewAppointment");
            axios.post('../Backend/mainRoutes.php', data)
                .then(function (r) {
                    var schedule = [];

                    r.data.forEach(function (item) {
                        schedule.push({
                            groupId: item.id,
                            title: item.fn,
                            start: item.ad,
                            color: '#4731b6'
                        });
                    });

                    var calendarEl = document.getElementById('calendar1');

                    calendar1 = new FullCalendar.Calendar(calendarEl, {
                        selectable: true,
                        plugins: ["timeGrid", "dayGrid", "list", "interaction"],
                        timeZone: "Asia/Manila",
                        defaultView: "dayGridMonth",
                        contentHeight: "auto",
                        eventLimit: true,
                        dayMaxEvents: 4,
                        header: {
                            left: "prev,next today",
                            center: "title",
                            right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek"
                        },
                        events: schedule
                    });
                    calendar1.render();
                });
        },
        sendAppointment: function () {
            const vue = this;
            var data = new FormData();
            data.append("Method", "sendAppointment");
            data.append("fullname", vue.fullname);
            data.append("email", vue.email);
            data.append("ORNumber", vue.ORNumber);
            data.append("wheel", vue.wheel);
            data.append("engineNumber", vue.engineNumber);
            data.append("seriesModel", vue.seriesModel);
            data.append("yearModel", vue.yearModel);
            data.append("date", vue.dateAppointment);
            axios.post('../Backend/mainRoutes.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        alert("Wait for admin to confirm your request");
                    } else {
                        alert(r.data);
                    }
                });
        },
        getScheduleInACart: function () {
            const vue = this;
            var data = new FormData();
            data.append("Method", "viewAppointment");
            axios.post('../Backend/mainRoutes.php', data)
                .then(function (r) {
                    vue.scheduleInACart = [];

                    for (var v of r.data) {
                        vue.scheduleInACart.push({
                            appointId: v.appointId,
                            user_id: v.user_id,
                            fullname: v.fullname,
                            email: v.email,
                            orNumber: v.orNumber,
                            wheel: v.wheel,
                            engineNumber: v.engineNumber,
                            appointmentDate: v.appointmentDate,
                            seriesModel: v.seriesModel,
                            yearModel: v.yearModel,
                            created_at: v.created_at,
                            updated_at: v.updated_at,
                        })
                    }
                });
        },
        getUser: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("Method", "user");
            axios.post('../Backend/mainRoutes.php', data)
                .then(function (r) {
                    vue.selectedUser = [];

                    for (var v of r.data) {
                        if (v.user_id == id) {
                            vue.selectedUser.push({
                                user_id: v.user_id,
                                profile: v.profile,
                                fullname: v.fullname,
                                email: v.email,
                                password: v.password,
                                role: v.role,
                                status: v.status,
                                created: v.created,
                                updated: v.updated,
                            })
                        }
                    }

                });
        },
        updateUser: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("Method", "updateUser");
            data.append("profile", document.getElementById('updateProfile').files[0]);
            data.append("fullname", document.getElementById('updateFullname').value);
            axios.post('../Backend/mainRoutes.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        vue.user();
                    } else {
                        alert(r.data);
                    }
                });
        },
        changePassword: function () {
            if (document.getElementById('newPassword').value == document.getElementById('renewPassword').value) {
                const vue = this;
                var data = new FormData();
                data.append("Method", "changePassword");
                data.append("old", document.getElementById('oldPassword').value);
                data.append("new", document.getElementById('renewPassword').value);
                axios.post('../Backend/mainRoutes.php', data)
                    .then(function (r) {
                        if (r.data == 200) {
                            alert("Password successfully changed!");
                        } else if (r.data == 500) {
                            alert('Old Password is not match!');
                        } else {
                            alert(r.data);
                        }
                    });
            } else {
                alert("Password Not Match");
            }
        },
        requestDelete: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("Method", "requestDelete");
            axios.post('../Backend/mainRoutes.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        alert("Request Has Been Sent!");
                    } else {
                        alert(r.data);
                    }
                });
        },
        dateToString: function (date) {
            let d = new Date(date);
            return d.toDateString() + ', ' + d.toLocaleTimeString();
        },
    },
    computed: {
        searchVehicle() {
            if (!this.searchAVehicle) {
                return this.allVehicle;
            }

            return this.allVehicle.filter(d => d.seriesNumber.toLowerCase().includes(this.searchAVehicle.toLowerCase()));
        }
    },
    created: function () {
        this.getAllVehicle();
        this.getSchedule();
        this.getScheduleInACart();
        this.user();
    }
}).mount('#customer-vue')