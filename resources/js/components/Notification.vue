<template>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
            <span class="glyphicon glyphicon-bell">Notificaiones</span>
            <span class="badge badge-info" v-text="notifications.length"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li v-for="(id, notification) in notifications" :key="notification.id">
                <a  class="dropdown-item" :href="notifications[notification].data.link"
                    >{{ notifications[notification].data.text }}
                </a>
                <!-- <a class="dropdown-item" :href="notification.data.link">{{ JSON.parse(notification) }}</a> -->
            </li>
        </ul>
    </li>
</template>

<script>
    export default {
        data() {
            return {
                notifications: []
            }
        },

        mounted() {
            axios.get('notificaciones').then(res => {
                let me = this;
                me.notifications = res.data;
                // console.log(this.notifications);
                // for (var i = 0; i <= me.notifications.length; i++) {
                //     console.log(me.notifications[i].data['text']);
                //     console.log(me.notifications[i].data['link']);
                // }
                // console.log(me.notifications);
            })
        }
    }
</script>

