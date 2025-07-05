# Telegram Channel Join Checker Bot 🤖

This is a PHP-based Telegram bot that checks whether a user has joined a specific Telegram channel. If the user is not a member, the bot sends them a message to join the channel before proceeding.

## 📦 Features

- Check if a user has joined a specific channel
- Works with PHP (no framework needed)
- Sends customized messages based on join status
- Uses Telegram Bot API (via `curl`)

## 🚀 How It Works

1. The bot receives an incoming message via `php://input`.
2. It reads the user's ID and queries Telegram using `getChatMember`.
3. If the user **is not** in the channel, it sends a message with the join link.
4. If the user **is** in the channel, it allows interaction with the bot.

## 📂 Files

- `index.php`: Main logic file to handle updates and check membership
- You can add `config.php` later to store `API_TOKEN` and `channel_chat_id`

## 🔧 Setup

1. Set your bot's API token in the `define("API_TOKEN", "");` line.
2. Replace `channel_chat_id` with your channel's unique ID (e.g. `-1001234567890`).
3. Deploy the file on a PHP-supported server.
4. Set the Telegram webhook to point to your `index.php`.

## 🧪 Test

- Send `/start` to the bot
- If you're not joined, it will ask you to join
- Once joined, restart the bot and you’ll see a welcome message

## 📌 Author

Developed by **Ata Asadzadeh**  
GitHub: [@AtaDevPro](https://github.com/AtaDevPro)

---

Feel free to fork, improve, or use this project. Pull requests are welcome!
