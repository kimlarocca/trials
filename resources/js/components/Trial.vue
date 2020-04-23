<template>
    <div @click="toggleDetails" class="grid-x bg-white border-radius align-middle trial">
        <div class="cell large-10">
            <strong>{{ncit}}:</strong> {{title}}
        </div>
        <div class="cell large-2 text-right"><i class="fas fa-angle-down" :class="{'fa-angle-up': showDetails}"></i>
        </div>
        <transition name="slide">
            <div v-if="showDetails" class="cell large-12">
                <hr class="margin-top-1 margin-bottom-2">
                <div class="grid-x grid-margin-x grid-margin-y align-middle">
                    <div class="cell large-4 text-center">
                        <count-up :to="57"></count-up>
                        <h6 class="margin-top-1">Patients Screened</h6>
                    </div>
                    <div class="cell large-8">
                        <h6><a class="icon-link" :href="'/screen/'+ncit" target="_blank"><i class="fas fa-eye"></i> view screening link</a></h6>
                        <h6><a class="icon-link" href="#"><i class="fas fa-chart-line"></i> view screening stats</a></h6>
                        <h6><a class="icon-link" href="#"><i class="fas fa-edit"></i> Manage Trial-Specific Questions</a></h6>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        name: 'Trial',
        data () {
            return {
                trialData: []
            }
        },
        props: {
            ncit: String,
            title: String,
            showDetails: {
                type: Boolean,
                default: false
            }
        },
        methods: {
            toggleDetails () {
                this.showDetails = !this.showDetails
            }
        }
    }
</script>

<style lang="scss">
    .trial {
        width: 100%;
        padding: 1rem;
        margin-bottom: .5rem;

        .icon-link {
            line-height: 1.5rem;

            i {
                margin-right: .5rem;
                font-size: 1.5rem;
            }
        }

        .fa-angle-down,
        .fa-angle-up {
            font-size: 2rem;
            margin: 0;
        }
    }
</style>
