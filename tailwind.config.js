import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                title: ["32px", "38px"],
            },
            colors: {
                "yellow-primary": "#fff0b3",
                "yellow-secondary": "#fcea9d",
                "brown-primary": "#7a3711",
                "font-primary": "#212529",
                border: "#555555",
                "yellow-btn": "#dbc537",
                "font-btn": "#382417",
                footer: "#fc9f67",
            },
            height: {
                500: "500px",
            },
            boxShadow: {
                card: "0.5px 0.5px 2.5px 0.5px rgba(0, 0, 0, 0.2)",
                "card-hover": "1px 1px 2.5px 1px rgba(0, 0, 0, 0.4)",
            },
        },
    },

    plugins: [forms, typography],
};
