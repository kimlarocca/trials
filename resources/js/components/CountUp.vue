<template>
    <div class="count-up">
        <div>{{count}}</div>
    </div>
</template>

<script>
    export default {
        name: 'CountUp',
        props: {
            to: Number
        },
        data () {
            return {
                count: 0,
                interval: null,
                end: this.to
            }
        },
        computed: {
            increment () {
                return Math.ceil(this.end / 30)
            }
        },
        mounted () {
            this.interval = setInterval(this.tick, 40)
        },
        methods: {
            tick () {
                if (this.count + this.increment >= this.end) {
                    this.count = this.to.toLocaleString()
                    return clearInterval(this.interval)
                }
                this.count += this.increment
            }
        }
    }
</script>

<style lang="scss">
    @import "resources/sass/variables";

    .count-up {
        margin: auto;
        border-radius: 50%;
        border: 4px solid $secondary;
        color: $secondary;
        font-size: 4.25rem;
        font-weight: 500;
        width: 150px;
        height: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
