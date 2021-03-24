import pulsectl

pulse = pulsectl.Pulse('paos')
dev_list = pulse.card_list()[0]
print(dev_list.profile_list()[0])