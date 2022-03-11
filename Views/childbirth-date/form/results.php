<div ref="serma_cd_results" class="px-4 md:px-0">
    <div class="container border rounded-lg mt-6 border-[#ECAC4A]" v-if="show_result">
        <div class="grid grid-cols-12 gap-2 p-6 bg-[#ecac4a1a]">
            <div class="col-span-12">
                <p class="text-black text-13px md:text-16px text-center">
                    <b>¡Felicidades!</b> estos son tus resultados:
            </div>
        </div>
        <div class="grid grid-cols-1 pl-4 pr-6 my-4">
            <div class="grid grid-cols-1 md:grid-cols-3 mt-6 pb-6 gap-y-7 md:gap-y-14">

                <div class="md:border-r border-[#D4D5DA]">
                    <div class="flex justify-center">
                        <img class="w-[60px]" src="<?= SERMA_BABY_GESTATIONAL_AGE_URL ?>/assets/icons/childbirth-date/fertile-day.svg">
                    </div>
                    <div class="mt-6">
                        <p class="text-center text-13px md:text-14px">Días fértiles</p>
                        <h3 class="text-13px md:text-14px text-black font-semibold text-center">
                            {{ formatDate({d: results.fertile_date.from}) }} -
                            {{ formatDate({d: results.fertile_date.to}) }}
                        </h3>
                    </div>
                </div>

                <div class="md:border-r border-[#D4D5DA]">
                    <div class="flex justify-center">
                        <img class="w-[60px]" src="<?= SERMA_BABY_GESTATIONAL_AGE_URL ?>/assets/icons/childbirth-date/conception-date.svg">
                    </div>
                    <div class="mt-6">
                        <p class="text-center text-13px md:text-14px">Fecha de concepción</p>
                        <h3 class="text-13px md:text-14px text-black font-semibold text-center">
                            {{ formatDate({d: results.conception_date}) }}
                        </h3>
                    </div>
                </div>

                <div>
                    <div class="flex justify-center">
                        <img class="w-[60px]" src="<?= SERMA_BABY_GESTATIONAL_AGE_URL ?>/assets/icons/childbirth-date/1st-semester.svg">
                    </div>
                    <div class="mt-6">
                        <p class="text-center text-13px md:text-14px">Fin 1er semestre (12 s)</p>
                        <h3 class="text-13px md:text-14px text-black font-semibold text-center">
                            {{ formatDate({d: results.first_semester}) }}
                        </h3>
                    </div>
                </div>

                <div class="md:border-r border-[#D4D5DA]">
                    <div class="flex justify-center">
                        <img class="w-[60px]" src="<?= SERMA_BABY_GESTATIONAL_AGE_URL ?>/assets/icons/childbirth-date/2nd-semester.svg">
                    </div>
                    <div class="mt-6">
                        <p class="text-center text-13px md:text-14px">Fin 2do semestre (27 s)</p>
                        <h3 class="text-13px md:text-14px text-black font-semibold text-center">
                            {{ formatDate({d: results.second_semester}) }}
                        </h3>
                    </div>
                </div>

                <div class="md:border-r border-[#D4D5DA]">
                    <div class="flex justify-center">
                        <img class="w-[60px]" src="<?= SERMA_BABY_GESTATIONAL_AGE_URL ?>/assets/icons/childbirth-date/childbirth.svg">
                    </div>
                    <div class="mt-6">
                        <p class="text-center text-14px">Fecha de parto (40 s)</p>
                        <h3 class="text-13px md:text-14px text-black font-semibold text-center">
                            {{ formatDate({d: results.childbirth_date}) }}
                        </h3>
                    </div>
                </div>

                <div class="flex justify-center items-center">
                    <button type="button" class="w-full md:w-auto my-3 rounded px-6 py-3 text-purple-darken text-center font-normal bg-transparent" @click="resetForm">
                        <span class="fas fa-chevron-left mr-2 "></span>
                        <span class="text-14px">Comenzar de nuevo</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>