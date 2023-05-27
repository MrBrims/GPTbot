import { Telegraf, session } from 'telegraf'
import { message } from 'telegraf/filters'
import { code } from 'telegraf/format'
import mongoose from 'mongoose'
import config from 'config'
import { ogg } from './ogg.js'
import { openai } from './openai.js'
import { removeFile } from './utils.js'
import { initCommand, processTextToChat } from './logic.js'

const bot = new Telegraf(config.get('TELEGRAM_TOKEN'))

bot.telegram.setMyCommands([
  { command: '/start', description: 'Старт бота' },
  { command: '/help', description: 'Помощь' },
  { command: '/advert', description: 'Реклама' },
  { command: '/reset', description: 'Сбросить контекст ChatGPT' },
])

bot.use(session())

bot.command('start', initCommand)

bot.command('reset', initCommand)

bot.command('help', initCommand)

bot.command('users', initCommand)

bot.command('advert', initCommand)



bot.on(message('voice'), async (ctx) => {
  try {
    ctx.session = ctx.session || {}
    await ctx.reply(code('Сообщение принял. Жду ответ от сервера...'))
    const link = await ctx.telegram.getFileLink(ctx.message.voice.file_id)
    const userId = String(ctx.message.from.id)
    const oggPath = await ogg.create(link.href, userId)
    const mp3Path = await ogg.toMp3(oggPath, userId)

    removeFile(oggPath)

    const text = await openai.transcription(mp3Path)
    await ctx.reply(code(`Ваш запрос: ${text}`))

    await processTextToChat(ctx, text)
  } catch (e) {
    console.log(`Error while voice message`, e.message)
  }
})

bot.on(message('text'), async (ctx) => {
  try {
    ctx.session = ctx.session || {}
    await ctx.reply(code('Сообщение принял. Жду ответ от сервера...'))
    await processTextToChat(ctx, ctx.message.text)
  } catch (e) {
    console.log(`Error while voice message`, e.message)
  }
})

async function start() {
  try {
    await mongoose.connect(config.get('MONGO_URI'), {
      useNewUrlParser: true,
      useUnifiedTopology: true,
    })

    bot.launch()

    console.log('MongoDB Connected and bot started.')

    process.on('uncaughtException', (err) => {
      console.error('Неперехваченное исключение:', err)
      process.exit(1)
    })

    process.on('unhandledRejection', (reason, promise) => {
      console.error('Неперехваченное отклонение промиса:', reason, promise)
    })

  } catch (e) {
    console.log('Server Error', e.message)
    process.exit(1)
  }
}


start()