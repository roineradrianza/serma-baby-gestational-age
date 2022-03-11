<div ref="serma_cd_container" class="container md:border border-gray-300 rounded-2xl px-4 md:px-0">
    <div class="grid grid-cols-1 md:grid-cols-8">
        <div class="hidden md:inline col-span-3 px-3 md:px-3 pt-6 pb-10 bg-cover"
            style="background-image: url('<?= SERMA_BABY_GESTATIONAL_AGE_URL ?>/assets/img/section-1-bg.svg'); background-repeat: no-repeat">
            <img class="pb-3 max-w-[208px] mx-auto"
                src="<?= SERMA_BABY_GESTATIONAL_AGE_URL ?>/assets/img/childbirth-date-bg.png">
        </div>

        <div class="bg-[#62cef933] md:col-span-5 p-3 md:p-6 rounded-2xl md:rounded-l-none">
            <form method="post">
                <h2
                    class="px-4 pt-2 pb-1 bg-[#FFE082] rounded-br-2xl rounded-tl-2xl text-18px text-center md:text-left text-black font-semibold mb-6 md:w-fit">
                    Fecha de parto y <span
                        class="font-['Cookie'] text-[#FB80BA] font-normal text-[28px]">Concepción</span></h2>
                <div class="grid grid-cols-5 mb-4">
                    <div class="col-span-3 flex items-center">
                        <img class="w-[20px] mr-2"
                            src="<?= SERMA_BABY_GESTATIONAL_AGE_URL ?>/assets/icons/gestational-age/drop.svg">
                        <label class="text-secondary text-13px md:text-14px" for="">
                            Primer día de su último período
                        </label>
                    </div>
                    <div class="col-span-2 relative">
                        <input datepicker ref="childbirth_date_input" datepicker-format="dd/mm/yyyy"
                            datepicker-language="es" type="text"
                            class="bg-gray-50 border border-gray-300 text-icon text-12px md:text-14px rounded-lg block w-full pr-10 p-2.5"
                            placeholder="DD/MM/YYYY">
                        <div class="flex absolute inset-y-0 right-0 items-center pl-3 pointer-events-none">
                            <img class="w-[20px] mr-2"
                                src="<?= SERMA_BABY_GESTATIONAL_AGE_URL ?>/assets/icons/calendar.svg">
                        </div>
                    </div>
                </div>

                <button type="button"
                    class="my-3 w-full md:w-auto rounded text-14px bg-green-lighten px-4 py-4 md:px-12 md:py-3 text-white font-regular"
                    @click="getResults" :disabled="loading">
                    <span v-if="loading">Calculando...</span>
                    <span v-else>
                        Calcula tus fechas
                    </span>
                </button>
            </form>
        </div>

    </div>
</div>

<?= SERMA_BABY_GESTATIONAL_AGE_TEMPLATE::show_template('childbirth-date/form/results') ?>