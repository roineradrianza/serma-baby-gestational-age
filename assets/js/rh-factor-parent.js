/*VUE INSTANCE*/

const vm = Vue.createApp({
    data () {
        return {
            loading: false,
            show_result: false,
            gender_selected: 0,
            form: {
                father_rh: 1,
                mother_rh: 1
            },
            default: {
                father_rh: 1,
                mother_rh: 1
            },
        }
    },
  
    methods: {
        getResults() {
            let app = this
            app.loading = true

            app.calc().then( res => {
                app.gender_selected = res
                app.loading = false
                app.show_result = true
                app.$refs.serma_gthfp_results.scrollIntoView({behavior: "smooth"})  
            })

        },

        resetForm() {
            let app = this
            app.show_result = false
            app.gender_selected = 0
            app.form = Object.assign({}, app.default)
            app.$refs.serma_gthfp_container.scrollIntoView({behavior: "smooth"})
        },

        async calc() {
            let app = this

            let father = parseInt(app.form.mother_rh) || 0
		    let mother = parseInt(app.form.father_rh) || 0

    
            return father === mother;

        }

    }
  })
  .mount('#serma-gthfp-container')
