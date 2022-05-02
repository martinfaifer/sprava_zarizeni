import { createStore } from 'vuex'

export const store = createStore({
    state: {
        alerts: [],
        user: []
    },
    mutations: {
        update(state, alert) {
            state.alerts.push(alert);
        },
    },
});
