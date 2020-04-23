<template>
    <nav>
        <input id="toggle" type="checkbox">
        <label for="toggle" class="hamburger" id="trigger" @click="open=!open">
            <div class="top-bun"></div>
            <div class="meat"></div>
            <div class="bottom-bun"></div>
        </label>
        <div class="menu-text">menu</div>
        <transition name="fade">
            <div v-if="open" class="menu border-radius bg-tertiary">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/screen">Get Screened</a></li>
                    <li><a href="/search">Search Clinical Trials</a></li>
                    <li><a href="/resources">Resources</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                    <li><a href="/login">Client Login</a></li>
                </ul>
            </div>
        </transition>
    </nav>
</template>

<script>
    export default {
        name: 'Nav',
        data () {
            return {
                open: false
            }
        }
    }
</script>

<style lang="scss">
    @import "resources/sass/variables";

    $nav-hamburger-color: black;
    $nav-hamburger-width: 2em;
    $nav-hamburger-width-larger: 2.5em;
    $nav-hamburger-thickness: 3px;

    nav {
        z-index: 100;
        display: flex;
        margin-top: 10px;
        position: relative;

        .hamburger {
            width: 2em;
            height: 45px;
            z-index: 200;

            div {
                position: relative;
                width: $nav-hamburger-width;
                height: $nav-hamburger-thickness;
                border-radius: 2px;
                background-color: $nav-hamburger-color;
                margin: 6px 0;
                transition: all 0.3s ease-in-out;

                &:nth-child(2) {
                    width: $nav-hamburger-width-larger;
                }
            }
        }

        //hamburger animations
        #toggle {
            display: none;

            &:checked + .hamburger .top-bun {
                transform: rotate(-45deg);
                margin-top: 1rem;
            }

            &:checked + .hamburger .bottom-bun {
                opacity: 0;
                transform: rotate(45deg);
            }

            &:checked + .hamburger .meat {
                width: $nav-hamburger-width;
                transform: rotate(45deg);
                margin-top: -8.75px;
            }

            &:checked + .hamburger + .nav {
                top: 0;
                transform: scale(1);
            }
        }

        .menu-text {
            display: flex;
            text-transform: uppercase;
            font-size: .875rem;
            font-weight: 700;
            margin-top: .5rem;
        }

        .menu {
            position: absolute;
            width: auto;
            top: 50px;
            left: 0;
            padding: 1rem;
            border: 2px solid $white;

            ul {
                list-style: none;
                padding: 0;
                margin: 0;

                li {
                    margin: 0;
                    padding: .5rem;

                    a,
                    a:visited,
                    a:active {
                        color: $black;
                        font-weight: 700;

                        &:hover {
                            color: $primary;
                        }
                    }
                }
            }
        }
    }
</style>
