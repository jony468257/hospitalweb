<style>
    /* ============================================
       SHADCN UI THEME VARIABLES
       Customize these variables to match your brand
       Compatible with shadcn/ui theming
    ============================================ */
    
    :root {
        /* Base radius for components */
        --radius: 0.75rem;
        
        /* Light mode colors - Premium Slate/Indigo */
        --background: oklch(0.99 0.005 240);
        --foreground: oklch(0.25 0.03 260);
        --card: oklch(1 0 0);
        --card-foreground: oklch(0.25 0.03 260);
        --popover: oklch(1 0 0);
        --popover-foreground: oklch(0.25 0.03 260);
        --primary: oklch(0.45 0.18 260);        /* Deep Indigo */
        --primary-foreground: oklch(0.99 0.01 260);
        --secondary: oklch(0.96 0.02 260);
        --secondary-foreground: oklch(0.3 0.05 260);
        --muted: oklch(0.96 0.01 260);
        --muted-foreground: oklch(0.55 0.03 260);
        --accent: oklch(0.94 0.03 260);
        --accent-foreground: oklch(0.2 0.05 260);
        --destructive: oklch(0.6 0.18 25);
        --destructive-foreground: oklch(1 0 0);
        --border: oklch(0.9 0.02 260);
        --input: oklch(0.9 0.02 260);
        --ring: oklch(0.5 0.15 260);
        
        /* Sidebar colors - Elegant Navy Tint */
        --sidebar: oklch(1 0 0);
        --sidebar-foreground: oklch(0.3 0.05 260);
        --sidebar-primary: oklch(0.45 0.18 260);
        --sidebar-primary-foreground: oklch(1 0 0);
        --sidebar-accent: oklch(0.96 0.02 260);
        --sidebar-accent-foreground: oklch(0.45 0.18 260);
        --sidebar-border: oklch(0.9 0.02 260);
        --sidebar-ring: oklch(0.5 0.15 260);
        
        /* Semantic colors */
        --success: oklch(0.65 0.15 150);
        --success-foreground: oklch(1 0 0);
        --warning: oklch(0.75 0.15 80);
        --info: oklch(0.6 0.15 240);
        
        /* Card shadows - Softer, deeper */
        --card-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.07), 0 1px 2px -1px rgb(0 0 0 / 0.07);
        --card-shadow-hover: 0 10px 15px -3px rgb(0 0 0 / 0.05), 0 4px 6px -4px rgb(0 0 0 / 0.05);
    }

    /* Dark mode colors */
    .dark {
        --background: oklch(0.12 0.02 260);
        --foreground: oklch(0.95 0.01 260);
        --card: oklch(0.15 0.02 260);
        --card-foreground: oklch(0.95 0.01 260);
        --popover: oklch(0.15 0.02 260);
        --popover-foreground: oklch(0.95 0.01 260);
        --primary: oklch(0.65 0.18 260);      /* Brighter Blue/Indigo for dark mode */
        --primary-foreground: oklch(0.1 0.02 260);
        --secondary: oklch(0.22 0.04 260);
        --secondary-foreground: oklch(0.95 0.01 260);
        --muted: oklch(0.22 0.02 260);
        --muted-foreground: oklch(0.65 0.02 260);
        --accent: oklch(0.22 0.04 260);
        --accent-foreground: oklch(0.95 0.01 260);
        --destructive: oklch(0.5 0.15 25);
        --destructive-foreground: oklch(0.95 0.01 260);
        --border: oklch(0.25 0.02 260);
        --input: oklch(0.25 0.02 260);
        --ring: oklch(0.6 0.15 260);
        
        /* Sidebar colors (dark mode) */
        --sidebar: oklch(0.12 0.02 260);
        --sidebar-foreground: oklch(0.85 0.02 260);
        --sidebar-primary: oklch(0.65 0.18 260);
        --sidebar-primary-foreground: oklch(0.1 0.02 260);
        --sidebar-accent: oklch(0.2 0.04 260);
        --sidebar-accent-foreground: oklch(0.95 0.01 260);
        --sidebar-border: oklch(0.25 0.02 260);
        
        --card-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.3);
        --card-shadow-hover: 0 10px 15px -3px rgb(0 0 0 / 0.4);
    }
</style>
