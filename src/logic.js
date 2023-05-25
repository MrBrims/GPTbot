import { openai } from './openai.js'

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
  } else {
    ctx.session = { messages: [] }
    await ctx.reply('Жду вашего голосового или текстового сообщения')
  }
}

// export async function processTextToChat(ctx, content) {
//   try {
//     ctx.session.messages.push({ role: openai.roles.USER, content })

//     const response = await openai.chat(ctx.session.messages)

//     ctx.session.messages.push({
//       role: openai.roles.ASSISTANT,
//       content: response.content,
//     })

//     await ctx.reply(response.content)
//   } catch (e) {
//     console.log('Error while proccesing text to gpt', e.message)
//   }
// }

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
