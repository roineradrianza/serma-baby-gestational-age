/*VUE INSTANCE*/
moment.locale('es')
const vm = Vue.createApp({
        data() {
            return {
                loading: false,
                show_result: false,
                results: {
                    date: moment().format('YYYY-MM-DD'),
                    day: '',
                    week: '',
                },
                default: {
                    date: moment().format('YYYY-MM-DD'),
                    day: '',
                    week: '',
                }
            }
        },

        methods: {
            getResults() {
                let app = this
                app.loading = true

                app.calc().then(res => {
                    app.results.date = res.date
                    app.results.day = res.day
                    app.results.week = res.week

                    app.loading = false
                    app.show_result = true
                    app.$refs.serma_gc_results.scrollIntoView({
                        behavior: "smooth"
                    })
                })

            },

            resetForm() {
                let app = this
                app.show_result = false
                app.$refs.last_menstrual_period_input.value = ''
                app.$refs.duration_input.value = 20

                app.results = Object.assign({}, app.default)
                app.$refs.serma_gc_container.scrollIntoView({
                    behavior: "smooth"
                })
            },

            async calc() {
                let app = this

                let last_menstrual_period = app.$refs.last_menstrual_period_input.value
                let cycle = app.$refs.duration_input.value

                let dateVal = last_menstrual_period.split('/');
                let day = dateVal[0];
                let month = dateVal[1];
                let year = dateVal[2];

                let lmpDate = moment(`${year}-${month}-${day}`);

                let lmpDateVal = lmpDate.valueOf();
                lmpDateVal = lmpDateVal + ((cycle - 28) * 24 * 60 * 60 * 1000)
                let pregVal = ((40 * 7) - 1) * 60 * 60 * 24 * 1000;
                let gestVal = moment()
                let curGestVal = gestVal.valueOf()
                curGestVal = (curGestVal - lmpDateVal) / (24 * 60 * 60 * 1000)
                lmpDateVal = lmpDateVal + pregVal
                curGestVal = Math.round(curGestVal)
                let lmpWkVal = curGestVal / 7
                lmpWkVal = parseInt(lmpWkVal)
                let lmpDyVal = curGestVal % 7
                lmpDateVal = moment(lmpDateVal).format('YYYY-MM-DD')

                return {
                    date: lmpDateVal,
                    day: lmpWkVal,
                    week: lmpDyVal
                }

            },

            formatDate({d = '', f = 'DD [de] MMMM [de] YYYY'}) {
                return moment(d).format(f)
            }

        }
    })
    .mount('#serma-gc-container')