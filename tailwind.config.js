import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                'h1': ['32px', { lineHeight: '1.2', fontWeight: '700' }],
                'h2': ['24px', { lineHeight: '1.4', fontWeight: '600' }],
                'body': ['16px', { lineHeight: '1.5', fontWeight: '400' }],
                'small': ['14px', { lineHeight: '1.5', fontWeight: '400' }],
            },
            borderRadius: {
                'card': '12px',
            },
            boxShadow: {
                'card': '0 4px 25px -5px rgba(0, 0, 0, 0.1), 0 2px 10px -2px rgba(0, 0, 0, 0.05)',
            },
            colors: {
                primary: {
                    DEFAULT: '#0284c7', // Sky 600 - Great for medical trust
                    light: '#e0f2fe',
                    dark: '#0369a1',
                },
                secondary: {
                    DEFAULT: '#64748b', // Slate 500
                    light: '#f1f5f9',
                },
                medical: {
                    blue: '#0EA5E9',
                    teal: '#14B8A6',
                    green: '#22C55E',
                    red: '#EF4444',
                }
            },
            keyframes: {
                'fade-in-up': {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                'fade-in': {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                }
            },
            animation: {
                'fade-in-up': 'fade-in-up 0.6s ease-out forwards',
                'fade-in': 'fade-in 0.5s ease-out forwards',
            }
        },
    },

    plugins: [forms],
};
