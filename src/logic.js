import { openai } from './openai.js'
import User from './models/user.js'

export const INITIAL_SESSION = {
  messages: [],
}


export async function initCommand(ctx) {
  if (ctx.message.text === '/reset') {
    if (!ctx.session) {
      ctx.session = {}
    }
    ctx.session.messages = []
    await ctx.reply('Контекст чата сброшен')
  } else if (ctx.message.text === '/start') {
    const telegramId = ctx.message.from.id;
    const firstName = ctx.message.from.first_name;
    const lastName = ctx.message.from.last_name;
    const username = ctx.message.from.username;

    // Проверяем, есть ли пользователь в базе данных
    let user = await User.findOne({ telegramId });

    // Проверяем, изменились ли данные пользователя
    if (user && (user.firstName !== firstName || user.lastName !== lastName || user.username !== username)) {
      user.firstName = firstName;
      user.lastName = lastName;
      user.username = username;
      await user.save();
    } else if (!user) {
      // Если пользователь не найден, создаем новую запись
      user = new User({
        telegramId,
        firstName,
        lastName,
        username,
      });
      await user.save();
    }

    ctx.session = { messages: [] }
    await ctx.replyWithSticker('https://tlgrm.ru/_/stickers/8a1/9aa/8a19aab4-98c0-37cb-a3d4-491cb94d7e12/192/102.webp')
    await ctx.reply(`Привет, ${ctx.message.from.first_name}! Просто спроси о том, что тебя интересует. Я поддерживаю как голосовые, так и текстовые сообщения.`)
  } else if (ctx.message.text === '/users') {
    const count = await User.countDocuments();
    await ctx.reply(`Количество пользователей: ${count}`);
  } else if (ctx.message.text === '/help') {
    await ctx.reply('Если бот долгое время не отвечает, возможно возникла проблема с серверами openAI. Для решения проблемы попробуйте сбросить контекст чата (команда /reset).')
  } else if (ctx.message.text === '/advert') {
    await ctx.reply('По вопросам рекламы стучаться сюда https://t.me/pushkin9999')
  }
}

export async function processTextToChat(ctx, content) {
  try {
    if (!ctx.session.messages) {
      ctx.session.messages = []
    }
    ctx.session.messages.push({ role: openai.roles.USER, content })

    const response = await openai.chat(ctx.session.messages)

    ctx.session.messages.push({
      role: openai.roles.ASSISTANT,
      content: response.content,
    })

    await ctx.reply(response.content)
  } catch (e) {
    console.log('Error while proccesing text to gpt', e.message)
  }
}
