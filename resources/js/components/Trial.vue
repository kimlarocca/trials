<template>
    <div @click="toggleDetails" class="grid-x bg-white border-radius align-middle trial">
        <div class="cell large-10">
            <strong>{{ncit}}:</strong> {{title}}
        </div>
        <div class="cell large-2 text-right"><i class="fas fa-angle-down" :class="{'fa-angle-up': showDetails}"></i></div>
        <transition name="slide">
            <div v-show="showDetails" class="cell large-12">
                <hr class="margin-vertical-1">
                <h6 class="text-primary">Screened Patients</h6>
                <p><em>TO DO! Stats on screen patients for this trial</em></p>
                <h6 class="text-primary">Trial-Specific Questions:</h6>
                <p><em>TO DO! add/update/delete questions for this trial</em></p>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        name: 'Trial',
        data () {
            return {
                trialData: [],
                showDetails: false
            }
        },
        props: {
            ncit: String,
            title: String
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

        i {
            font-size: 2rem;
        }
    }
</style>
