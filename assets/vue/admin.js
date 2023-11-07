const { createApp } = Vue;

createApp({
    data() {
        return {
            appointments: [],
            users: [],
            selectedUseriD: [],
            selectedAppointmentId: [],
            selecteToUpdate: 0,
            dateAppointment: '',
            messageAppointment: '',
            searchFromAUsers: '',
        }
    },
    methods: {
        allUsersAdmin: function () {
            const vue = this;
            var data = new FormData();
            data.append("Method", "allUsersAdmin");
            axios.post('../../Backend/mainRoutes.php', data)
                .then(function (r) {
                    vue.users = [];

                    for (var u of r.data) {
                        vue.users.push({
                            user_id: u.user_id,
                            profile: u.profile,
                            fullname: u.fullname,
                            email: u.email,
                            role: u.role,
                            status: u.status,
                            created: u.created,
                        });
                    }
                });
        },
        setAppointmentToUserAdmin: function (appId) {
            const vue = this;
            var data = new FormData();
            data.append("Method", "setAppointmentToUserAdmin");
            data.append("date", vue.dateAppointment);
            data.append("message", vue.messageAppointment);
            data.append("appId", appId);
            axios.post('../../Backend/mainRoutes.php', data)
                .then(function (r) {
                    alert(r.data);
                });
        },
        viewAppointmentInCartAdmin: function () {
            const vue = this;
            var data = new FormData();
            data.append("Method", "viewAppointmentInCartAdmin");
            axios.post('../../Backend/mainRoutes.php', data)
                .then(function (r) {
                    vue.appointments = [];

                    for (var u of r.data) {
                        vue.appointments.push({
                            appointId: u.appointId,
                            fullname: u.fullname,
                            email: u.email,
                            orNumber: u.orNumber,
                            wheel: u.wheel,
                            message: u.message,
                            engineNumber: u.engineNumber,
                            appointmentDate: u.appointmentDate,
                            seriesModel: u.seriesModel,
                            yearModel: u.yearModel,
                            created_at: u.created_at,
                        });
                    }
                });
        },
        selectedAppointment: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("Method", "viewAppointmentInCartAdmin");
            axios.post('../../Backend/mainRoutes.php', data)
                .then(function (r) {
                    vue.selectedAppointmentId = [];

                    for (var u of r.data) {
                        if (u.appointId == id) {
                            vue.selectedAppointmentId.push({
                                appointId: u.appointId,
                                fullname: u.fullname,
                                email: u.email,
                                orNumber: u.orNumber,
                                wheel: u.wheel,
                                engineNumber: u.engineNumber,
                                appointmentDate: u.appointmentDate,
                                seriesModel: u.seriesModel,
                                yearModel: u.yearModel,
                                created_at: u.created_at,
                            });
                        }
                    }
                });
        },
        updateUserAdmin: function (user_id) {
            const vue = this;
            var data = new FormData();
            data.append("Method", "updateUserAdmin");
            data.append("status", vue.selecteToUpdate);
            data.append("user_id", user_id);
            axios.post('../../Backend/mainRoutes.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        if (vue.selecteToUpdate == 1) {
                            alert("User has been successfully Unrestricted");
                            vue.allUsersAdmin();
                        } else {
                            alert("User has been successfully Restricted");
                            vue.allUsersAdmin();
                        }
                    } else {
                        alert("User is missing!");
                    }
                });
        },
        selectedUser: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("Method", "allUsersAdmin");
            axios.post('../../Backend/mainRoutes.php', data)
                .then(function (r) {
                    vue.selectedUseriD = [];

                    for (var u of r.data) {
                        if (u.user_id == id) {
                            vue.selectedUseriD.push({
                                user_id: u.user_id,
                                profile: u.profile,
                                fullname: u.fullname,
                                email: u.email,
                                role: u.role,
                                status: u.status,
                                created: u.created,
                            });
                        }
                    }
                });
        },
        getSchedule: function () {
            const vue = this;
            var data = new FormData();
            data.append("Method", "viewAppointmentAdmin");
            axios.post('../../Backend/mainRoutes.php', data)
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
        dateToString: function (date) {
            let d = new Date(date);
            return d.toDateString() + ', ' + d.toLocaleTimeString();
        },
        getDate: function (date) {
            let d = new Date(date);
            return d.getDate();
        },
        theLocaleString: function (date) {
            let d = new Date(date);
            return d.toLocaleString('en-US', { month: 'long' });
        },
        getTheHours: function (date) {
            let d = new Date(date);
            return d.toLocaleTimeString();
        },
    },
    computed: {
        searchFromUsers: function () {
            if (!this.searchFromAUsers) {
                return this.users;
            }

            return this.users.filter(user => user.fullname.toLowerCase().includes(this.searchFromAUsers.toLowerCase()) || user.email.toLowerCase().includes(this.searchFromAUsers.toLowerCase()));
        },
        searchFromAppointment: function (){
            if (!this.searchFromAUsers) {
                return this.appointments;
            }

            return this.appointments.filter(u => u.fullname.toLowerCase().includes(this.searchFromAUsers.toLowerCase()) || u.email.toLowerCase().includes(this.searchFromAUsers.toLowerCase()));
        }
    },
    created: function () {
        this.getSchedule();
        this.allUsersAdmin();
        this.viewAppointmentInCartAdmin();
    }
}).mount('#admin-vue')